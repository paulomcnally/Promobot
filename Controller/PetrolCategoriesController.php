<?php
App::uses('AppController', 'Controller');
/**
 * PetrolCategories Controller
 *
 * @property PetrolCategory $PetrolCategory
 */
class PetrolCategoriesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PetrolCategory->recursive = 0;
		$this->set('petrolCategories', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PetrolCategory->exists($id)) {
			throw new NotFoundException(__('Invalid petrol category'));
		}
		$options = array('conditions' => array('PetrolCategory.' . $this->PetrolCategory->primaryKey => $id));
		$this->set('petrolCategory', $this->PetrolCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PetrolCategory->create();
			if ($this->PetrolCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The petrol category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The petrol category could not be saved. Please, try again.'));
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
		if (!$this->PetrolCategory->exists($id)) {
			throw new NotFoundException(__('Invalid petrol category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PetrolCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The petrol category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The petrol category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PetrolCategory.' . $this->PetrolCategory->primaryKey => $id));
			$this->request->data = $this->PetrolCategory->find('first', $options);
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
		$this->PetrolCategory->id = $id;
		if (!$this->PetrolCategory->exists()) {
			throw new NotFoundException(__('Invalid petrol category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PetrolCategory->delete()) {
			$this->Session->setFlash(__('Petrol category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Petrol category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
