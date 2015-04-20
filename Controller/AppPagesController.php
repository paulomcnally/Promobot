<?php
App::uses('AppController', 'Controller');
/**
 * AppPages Controller
 *
 * @property AppPage $AppPage
 */
class AppPagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AppPage->recursive = 0;
		$this->set('appPages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AppPage->exists($id)) {
			throw new NotFoundException(__('Invalid app page'));
		}
		$options = array('conditions' => array('AppPage.' . $this->AppPage->primaryKey => $id));
		$this->set('appPage', $this->AppPage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AppPage->create();
			if ($this->AppPage->save($this->request->data)) {
				$this->Session->setFlash(__('The app page has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The app page could not be saved. Please, try again.'));
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
		if (!$this->AppPage->exists($id)) {
			throw new NotFoundException(__('Invalid app page'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AppPage->save($this->request->data)) {
				$this->Session->setFlash(__('The app page has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The app page could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AppPage.' . $this->AppPage->primaryKey => $id));
			$this->request->data = $this->AppPage->find('first', $options);
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
		$this->AppPage->id = $id;
		if (!$this->AppPage->exists()) {
			throw new NotFoundException(__('Invalid app page'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AppPage->delete()) {
			$this->Session->setFlash(__('App page deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('App page was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
