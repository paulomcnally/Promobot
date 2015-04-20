<?php
App::uses('AppController', 'Controller');
/**
 * Emergencies Controller
 *
 * @property Emergency $Emergency
 */
class EmergenciesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Emergency->recursive = 0;
		$this->set('emergencies', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Emergency->exists($id)) {
			throw new NotFoundException(__('Invalid emergency'));
		}
		$options = array('conditions' => array('Emergency.' . $this->Emergency->primaryKey => $id));
		$this->set('emergency', $this->Emergency->find('first', $options));
	}
	
	public function replaceImages(){
		$fileComponent = $this->Components->load('File');
		$this->Emergency->recursive = -1;
		$emergencias = $this->Emergency->find("all");
		foreach($emergencias as $emergencia){
			if($emergencia['Emergency']['image'] != ""){
				$new_name = $fileComponent->renameFile($emergencia['Emergency']['image'], "emergency",$emergencia['Emergency']['name'].".png");
				$emergencia['Emergency']['image'] = $new_name;
				$this->Emergency->save($emergencia);
			}
		}
		var_dump($emergencias);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$path = "emergency";
			$image = $this->data['Emergency']['image'];
			$fileComponent = $this->Components->load('File');
			$imageUpload = $fileComponent->uploadFile($image, $path);
			if($imageUpload){
				$this->request->data['Emergency']['image'] = $path.DS.$imageUpload;
				$this->Emergency->create();
				if ($this->Emergency->save($this->request->data)) {
					$this->Session->setFlash(__('The emergency has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The emergency could not be saved. Please, try again.'));
				}
			}else {
				$this->Session->setFlash(__('Emergencia no se guardo. Renombre la imagen e intente de nuevo'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Emergency->exists($id)) {
			throw new NotFoundException(__('Invalid emergency'));
		}
		$options = array('conditions' => array('Emergency.' . $this->Emergency->primaryKey => $id));
		if ($this->request->is('post') || $this->request->is('put')) {
			$path = "emergency";
			$fileComponent = $this->Components->load('File');
			$image = $this->data['Emergency']['image'];
			$currentEmergency = $this->Emergency->find('first', $options);
			
			//Check if Emergency image is set and replace
			if($image['name'] != ''){
				$newFile = $fileComponent->replaceFile($image, $path, $currentEmergency['Emergency']['image']);
				if($newFile)
					$this->request->data['Emergency']['image'] = $path.DS.$newFile;
				else
					$this->Session->setFlash(__("Error al editar imagen. Renombre e intente de nuevo."));
			}else{
				$this->request->data['Emergency']['image'] = $currentEmergency['Emergency']['image'];
			}
			
			if ($this->Emergency->save($this->request->data)) {
				$this->Session->setFlash(__('The emergency has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emergency could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Emergency->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Emergency->id = $id;
		if (!$this->Emergency->exists()) {
			throw new NotFoundException(__('Invalid emergency'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Emergency->delete()) {
			$this->Session->setFlash(__('Emergency deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Emergency was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
