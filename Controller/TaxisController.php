<?php
App::uses('AppController', 'Controller');
/**
 * Taxis Controller
 *
 * @property Taxi $Taxi
 */
class TaxisController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Taxi->recursive = 0;
		$this->set('taxis', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Taxi->exists($id)) {
			throw new NotFoundException(__('Invalid taxi'));
		}
		$options = array('conditions' => array('Taxi.' . $this->Taxi->primaryKey => $id));
		$this->set('taxi', $this->Taxi->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {									
			$path = "taxi";
			$image = $this->data['Taxi']['img'];
			$fileComponent = $this->Components->load('File');
			$imageUpload = $fileComponent->uploadFile($image, $path);
			if($imageUpload)
				$this->request->data['Taxi']['img'] = $path.DS.$imageUpload;
			else
				$this->request->data['Taxi']['img'] = '';
			$this->Taxi->create();
			if ($this->Taxi->save($this->request->data)) {
				$this->Session->setFlash(__('The taxi has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The taxi could not be saved. Please, try again.'));
			}
		}		
		$cities = $this->Taxi->City->find('list');
		$this->set(compact('cities'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Taxi->exists($id)) {
			throw new NotFoundException(__('Invalid taxi'));
		}
			
		$options = array('conditions' => array('Taxi.' . $this->Taxi->primaryKey => $id));
		if ($this->request->is('post') || $this->request->is('put')) {
			$path = "taxi";
			$fileComponent = $this->Components->load('File');
			$image = $this->data['Taxi']['img'];
			$currentTaxi = $this->Taxi->find('first', $options);
				
			//Check if taxi image is set and replace
			if($image['name'] != ''){
				$newFile = $fileComponent->replaceFile($image, $path, $currentTaxi['Taxi']['img']);
				if($newFile)
					$this->request->data['Taxi']['img'] = $path.DS.$newFile;
				else
					$this->Session->setFlash(__("Error al editar imagen."));
			}else{
				$this->request->data['Taxi']['img'] = $currentTaxi['Taxi']['img'];
			}
			
			if($this->request->data['Taxi']['password'] == '')
				unset($this->request->data['Taxi']['password']);
			
			if ($this->Taxi->save($this->request->data)) {
				$this->Session->setFlash(__('The taxi has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The taxi could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Taxi.' . $this->Taxi->primaryKey => $id));
			$this->request->data = $this->Taxi->find('first', $options);
		}

		$cities = $this->Taxi->City->find('list');
		$this->set(compact('cities'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Taxi->id = $id;
		if (!$this->Taxi->exists()) {
			throw new NotFoundException(__('Invalid taxi'));
		}
		$this->request->onlyAllow('post', 'delete');
		$options = array('conditions' => array('Taxi.'.$this->Taxi->primaryKey => $id));
		$currentTaxi = $this->Taxi->find('first',$options);
		$fileComponent = $this->Components->load('File');
		$fileComponent->deleteFile($currentTaxi['Taxi']['img']);
		if ($this->Taxi->delete()) {
			$this->Session->setFlash(__('Taxi deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Taxi was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
