<?php
App::uses('AppController', 'Controller');
/**
 * Wifis Controller
 *
 * @property Wifi $Wifi
 */
class WifisController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Wifi->recursive = 0;
		$this->set('wifis', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Wifi->exists($id)) {
			throw new NotFoundException(__('Invalid wifi'));
		}
		$options = array('conditions' => array('Wifi.' . $this->Wifi->primaryKey => $id));
		$this->set('wifi', $this->Wifi->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Wifi->create();
			if ($this->Wifi->save($this->request->data)) {
				$this->Session->setFlash(__('The wifi has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wifi could not be saved. Please, try again.'));
			}
		}
		$users = $this->Wifi->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Wifi->exists($id)) {
			throw new NotFoundException(__('Invalid wifi'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Wifi->save($this->request->data)) {
				$this->Session->setFlash(__('The wifi has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wifi could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Wifi.' . $this->Wifi->primaryKey => $id));
			$this->request->data = $this->Wifi->find('first', $options);
		}
		$users = $this->Wifi->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Wifi->id = $id;
		if (!$this->Wifi->exists()) {
			throw new NotFoundException(__('Invalid wifi'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Wifi->delete()) {
			$this->Session->setFlash(__('Wifi deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Wifi was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
