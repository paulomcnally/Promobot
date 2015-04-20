<?php
App::uses('AppController', 'Controller');
/**
 * BetaUsers Controller
 *
 * @property BetaUser $BetaUser
 */
class BetaUsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BetaUser->recursive = 0;
		$this->set('betaUsers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BetaUser->exists($id)) {
			throw new NotFoundException(__('Invalid beta user'));
		}
		$options = array('conditions' => array('BetaUser.' . $this->BetaUser->primaryKey => $id));
		$this->set('betaUser', $this->BetaUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$path = "infobot";
			$image = $this->data['BetaUser']['testimony_img'];
			$fileComponent = $this->Components->load('File');
			$imageUpload = $fileComponent->uploadFile($image, $path);
			
			if($imageUpload)
				$this->request->data['BetaUser']['testimony_img'] = $path.DS.$imageUpload;
			else
				$this->request->data['BetaUser']['testimony_img'] = '';
			
			$this->BetaUser->create();
			if ($this->BetaUser->save($this->request->data)) {
				$this->Session->setFlash(__('The beta user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The beta user could not be saved. Please, try again.'));
			}
		}
		$deviceTypes = $this->BetaUser->DeviceType->find('list');
		$this->set(compact('deviceTypes'));
	}
	
	/**
	 * addFromLanding method
	 *
	 * @return void
	 */
	public function addFromLanding() {
		if ($this->request->is('post')) {
			$this->BetaUser->create();
			if ($this->BetaUser->save($this->request->data)) {
// 				$this->Session->setFlash(__('The beta user has been saved'));
// 				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El correo no pudo ser agregado a la lista beta.'));
			}
		}
		$this->redirect($this->referer());
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BetaUser->exists($id)) {
			throw new NotFoundException(__('Invalid beta user'));
		}
		$options = array('conditions' => array('BetaUser.' . $this->BetaUser->primaryKey => $id));
		if ($this->request->is('post') || $this->request->is('put')) {	
			$path = "infobot";
			$fileComponent = $this->Components->load('File');
			$image = $this->data['BetaUser']['testimony_img'];
			$currentBetaUser = $this->BetaUser->find('first', $options);
				
			//Check if business image is set and replace
			if($image['name'] != ''){
				$newFile = $fileComponent->replaceFile($image, $path, $currentBetaUser['BetaUser']['testimony_img']);
				if($newFile)
					$this->request->data['BetaUser']['testimony_img'] = $path.DS.$newFile;
				else
					$this->Session->setFlash(__("Error al editar imagen."));
			}else{
				$this->request->data['BetaUser']['testimony_img'] = $currentBetaUser['BetaUser']['testimony_img'];
			}
			
			if ($this->BetaUser->save($this->request->data)) {
				$this->Session->setFlash(__('Guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, intente de nuevo.'));
			}
		} else {
			$this->request->data = $this->BetaUser->find('first', $options);
		}
		$deviceTypes = $this->BetaUser->DeviceType->find('list');
		$this->set(compact('deviceTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BetaUser->id = $id;
		if (!$this->BetaUser->exists()) {
			throw new NotFoundException(__('Invalid beta user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BetaUser->delete()) {
			$this->Session->setFlash(__('Beta user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Beta user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
