<?php
App::uses('AppController', 'Controller');
/**
 * EmergencyPhones Controller
 *
 * @property EmergencyPhone $EmergencyPhone
 */
class EmergencyPhonesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EmergencyPhone->recursive = 0;
		$this->set('emergencyPhones', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EmergencyPhone->exists($id)) {
			throw new NotFoundException(__('Invalid emergency phone'));
		}
		$options = array('conditions' => array('EmergencyPhone.' . $this->EmergencyPhone->primaryKey => $id));
		$this->set('emergencyPhone', $this->EmergencyPhone->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EmergencyPhone->create();
			if ($this->EmergencyPhone->save($this->request->data)) {
				$this->Session->setFlash(__('The emergency phone has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emergency phone could not be saved. Please, try again.'));
			}
		}
		$emergencies = $this->EmergencyPhone->Emergency->find('list');
		$this->set(compact('emergencies'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EmergencyPhone->exists($id)) {
			throw new NotFoundException(__('Invalid emergency phone'));
		}		
		if ($this->request->is('post') || $this->request->is('put')) {								
			if ($this->EmergencyPhone->save($this->request->data)) {			
				$this->EmergencyPhone->Emergency->id = $this->request->data['EmergencyPhone']['emergencies_id'];
				$this->EmergencyPhone->Emergency->save();
				$this->Session->setFlash(__('The emergency phone has been saved'));
				$this->redirect(array('action' => 'index'));				
			} else {
				$this->Session->setFlash(__('The emergency phone could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EmergencyPhone.' . $this->EmergencyPhone->primaryKey => $id));
			$this->request->data = $this->EmergencyPhone->find('first', $options);
		}
		$emergencies = $this->EmergencyPhone->Emergency->find('list');
		$this->set(compact('emergencies'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EmergencyPhone->id = $id;
		if (!$this->EmergencyPhone->exists()) {
			throw new NotFoundException(__('Invalid emergency phone'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EmergencyPhone->delete()) {
			$this->Session->setFlash(__('Emergency phone deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Emergency phone was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
