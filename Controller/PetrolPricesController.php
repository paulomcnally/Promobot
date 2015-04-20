<?php
App::uses('AppController', 'Controller');
/**
 * PetrolPrices Controller
 *
 * @property PetrolPrice $PetrolPrice
 */
class PetrolPricesController extends AppController {
	
/**
 * Components used by petrol prices controller
 * @var $components
 */
	public $components = array('RequestHandler');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PetrolPrice->recursive = 0;
		$this->set('petrolPrices', $this->paginate());
		$this->set('_serialize', array('petrolPrices'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PetrolPrice->exists($id)) {
			throw new NotFoundException(__('Invalid petrol price'));
		}
		$options = array('conditions' => array('PetrolPrice.' . $this->PetrolPrice->primaryKey => $id));
		$this->set('petrolPrice', $this->PetrolPrice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PetrolPrice->create();
			if ($this->PetrolPrice->save($this->request->data)) {
				$this->Session->setFlash(__('The petrol price has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The petrol price could not be saved. Please, try again.'));
			}
		}
		$petrolCategories = $this->PetrolPrice->PetrolCategory->find('list');
		$petrols = $this->PetrolPrice->Petrol->find('list');
		$this->set(compact('petrolCategories', 'petrols'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PetrolPrice->exists($id)) {
			throw new NotFoundException(__('Invalid petrol price'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PetrolPrice->save($this->request->data)) {
				$this->Session->setFlash(__('The petrol price has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The petrol price could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PetrolPrice.' . $this->PetrolPrice->primaryKey => $id));
			$this->request->data = $this->PetrolPrice->find('first', $options);
		}
		$petrolCategories = $this->PetrolPrice->PetrolCategory->find('list');
		$petrols = $this->PetrolPrice->Petrol->find('list');
		$this->set(compact('petrolCategories', 'petrols'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PetrolPrice->id = $id;
		if (!$this->PetrolPrice->exists()) {
			throw new NotFoundException(__('Invalid petrol price'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PetrolPrice->delete()) {
			$this->Session->setFlash(__('Petrol price deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Petrol price was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
