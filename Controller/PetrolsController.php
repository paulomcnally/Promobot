<?php
App::uses('AppController', 'Controller');
/**
 * Petrols Controller
 *
 * @property Petrol $Petrol
 */
class PetrolsController extends AppController {

	/**
	 * Components used by infobots controller
	 * @var $components
	 */
	public $components = array('RequestHandler');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Petrol->recursive = 0;
		$this->set('petrols', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Petrol->exists($id)) {
			throw new NotFoundException(__('Invalid petrol'));
		}
		$options = array('conditions' => array('Petrol.' . $this->Petrol->primaryKey => $id));
		$this->set('petrol', $this->Petrol->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$path = "petrol";
			$file = $this->data['Petrol']['image'];
			$fileComponent = $this->Components->load('File');
			$fileUpload = $fileComponent->uploadFile($file, $path);
			if($fileUpload){
				$this->request->data['Petrol']['image'] = $path.DS.$fileUpload;
				$this->Petrol->create();
				if ($this->Petrol->save($this->request->data)) {
					$this->Session->setFlash(__('The petrol has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The petrol could not be saved. Please, try again.'));
				}
			}else{
				$this->Session->setFlash(__('The petrol could not be saved. Please, try again.(Image)'));
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
		if (!$this->Petrol->exists($id)) {
			throw new NotFoundException(__('Invalid petrol'));
		}
		$options = array('conditions' => array('Petrol.' . $this->Petrol->primaryKey => $id));
		if ($this->request->is('post') || $this->request->is('put')) {
			$file = $this->data['Petrol']['image'];
			$currentPetrol = $this->Petrol->find('first', $options);
				
			//Check if category image is set and replace
			if($file['name'] != ''){
				$path = "petrol";
				$fileComponent = $this->Components->load('File');
				$newFile = $fileComponent->replaceFile($file, $path, $currentPetrol['Petrol']['image']);
				if($newFile)
					$this->request->data['Petrol']['image'] = $path.DS.$newFile;
				else
					$returnMessage .= "Error al editar imagen. ";
			}else{
				$this->request->data['Petrol']['image'] = $currentPetrol['Petrol']['image'];
			}
			
			if ($this->Petrol->save($this->request->data)) {
				$this->Session->setFlash(__('The petrol has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The petrol could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Petrol->find('first', $options);
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
		$this->Petrol->id = $id;
		if (!$this->Petrol->exists()) {
			throw new NotFoundException(__('Invalid petrol'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Petrol->delete()) {
			$this->Session->setFlash(__('Petrol deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Petrol was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function showMap(){
		
	}
	
	public function getGasInfo(){
		$file = Router::url('/', true)."app/webroot/files/gasolina.json";
		$json = file_get_contents($file);
		$this->set(compact('json'));
	}
}
