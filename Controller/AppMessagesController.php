<?php
App::uses('AppController', 'Controller');
/**
 * AppMessages Controller
 *
 * @property AppMessage $AppMessage
 */
class AppMessagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AppMessage->recursive = 0;
		$this->set('appMessages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AppMessage->exists($id)) {
			throw new NotFoundException(__('Invalid app message'));
		}
		$options = array('conditions' => array('AppMessage.' . $this->AppMessage->primaryKey => $id));
		$this->set('appMessage', $this->AppMessage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AppMessage->create();
			if ($this->AppMessage->save($this->request->data)) {
				$this->Session->setFlash(__('The app message has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The app message could not be saved. Please, try again.'));
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
		if (!$this->AppMessage->exists($id)) {
			throw new NotFoundException(__('Invalid app message'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AppMessage->save($this->request->data)) {
				$this->Session->setFlash(__('The app message has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The app message could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AppMessage.' . $this->AppMessage->primaryKey => $id));
			$this->request->data = $this->AppMessage->find('first', $options);
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
		$this->AppMessage->id = $id;
		if (!$this->AppMessage->exists()) {
			throw new NotFoundException(__('Invalid app message'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AppMessage->delete()) {
			$this->Session->setFlash(__('App message deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('App message was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
