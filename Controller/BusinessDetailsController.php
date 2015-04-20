<?php
App::uses('AppController', 'Controller');
/**
 * BusinessDetails Controller
 *
 * @property BusinessDetail $BusinessDetail
 */
class BusinessDetailsController extends AppController {

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
		$this->BusinessDetail->recursive = 1;
		$businessDetails = $this->BusinessDetail->find('all');
		$this->set(compact('businessDetails'));
	}

	/**
	 * List details per business
	 * @param string $id
	 * @throws NotFoundException
	 */
	public function listDetails($id = null){
		$this->loadModel('Business');
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Negocio Invalido'));
		}
		$this->paginate = array(
				'conditions' => array('BusinessDetail.businesses_id' => $id),
				'limit' => 20
		);
		$businessDetails = $this->paginate('BusinessDetail');
		$this->set(compact('businessDetails'));
	}
	
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->BusinessDetail->exists($id)) {
			throw new NotFoundException(__('Invalid business detail'));
		}
		$options = array('conditions' => array('BusinessDetail.' . $this->BusinessDetail->primaryKey => $id));
		$this->set('businessDetail', $this->BusinessDetail->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BusinessDetail->create();
			if ($this->BusinessDetail->saveAll($this->request->data, array('deep' => true))) {
				$this->Session->setFlash(__('The business detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The business detail could not be saved. Please, try again.'));
			}
		}
		$businesses = $this->BusinessDetail->Business->find('list');
		$cities = $this->BusinessDetail->City->find('list');
		$this->set(compact('businesses', 'cities'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->BusinessDetail->exists($id)) {
			throw new NotFoundException(__('Invalid business detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->BusinessDetail->PhoneNumber->deleteAll(array('PhoneNumber.business_details_id' => $id));
			if ($this->BusinessDetail->saveAll($this->request->data, array('deep' => true))) {
				$this->Session->setFlash(__('The business detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The business detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BusinessDetail.' . $this->BusinessDetail->primaryKey => $id));
			$this->request->data = $this->BusinessDetail->find('first', $options);
		}
		$businesses = $this->BusinessDetail->Business->find('list');
		$cities = $this->BusinessDetail->City->find('list');
		$options = array('conditions' => array('PhoneNumber.business_details_id' => $id));
		$phones = $this->BusinessDetail->PhoneNumber->find('all',$options);
		$this->set(compact('businesses', 'cities', 'phones'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function deletePhone($id = null) {
		if($id == null)
			$id = $this->request->data('id');
		$this->BusinessDetail->PhoneNumber->id = $id;
		$response = false;
		if ($this->BusinessDetail->PhoneNumber->exists()) {
			if($this->BusinessDetail->PhoneNumber->delete(array('PhoneNumber.id' => $id)))
				$response = true;
		}
		
		$this->set(compact('response'));
	}
	
	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$isAjax = false; 
		if($id == null){
			$id = $this->request->data('id');
			$isAjax = true;
		}
		
		$response = false;
		$this->BusinessDetail->id = $id;
		if (!$this->BusinessDetail->exists()) {
			throw new NotFoundException(__('Invalid business detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->BusinessDetail->PhoneNumber->deleteAll(array('PhoneNumber.business_details_id' => $id));
		if ($this->BusinessDetail->delete()) {
			if(!$isAjax){
				$this->Session->setFlash(__('Business detail deleted'));
				$this->redirect(array('action' => 'index'));
			}
			$response = true;
		}
		
		if($isAjax){
			$this->set(compact('response'));
			return;
		}
		$this->Session->setFlash(__('Business detail was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * Before render
	 * @see Controller::beforeRender()
	 */
	public function beforeRender(){
		//Set referer
		$this->set('referer',$this->referer());
	}
	
	/**
	 * Update phone numbers
	 */
	public function updatePhoneNumbers(){
		$this->BusinessDetail->updatePhoneNumbers();
	}
}
