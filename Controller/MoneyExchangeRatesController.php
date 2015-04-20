<?php
App::uses('AppController', 'Controller');
/**
 * MoneyExchangeRates Controller
 *
 * @property MoneyExchangeRate $MoneyExchangeRate
 */
class MoneyExchangeRatesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MoneyExchangeRate->recursive = 0;
		$this->set('moneyExchangeRates', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MoneyExchangeRate->exists($id)) {
			throw new NotFoundException(__('Invalid money exchange rate'));
		}
		$options = array('conditions' => array('MoneyExchangeRate.' . $this->MoneyExchangeRate->primaryKey => $id));
		$this->set('moneyExchangeRate', $this->MoneyExchangeRate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$file = $this->request->data['MoneyExchangeRate']['excel_file'];
			if($file['name'] != ''){
				$path = "exchange";
				$fileComponent = $this->Components->load('File');
				$file_name = $fileComponent->uploadFile($file,$path,'files');
				if($file_name){
					$excelComponent = $this->Components->load('Excel');
					$excel_info = $excelComponent->readFile('files'.DS.$path.DS.$file_name);
					foreach ($excel_info as $info){
						if($info['B'] != ''){
							$this->MoneyExchangeRate->create();
							$savingRate['MoneyExchangeRate']['cambio'] = $info['B'];
							$date = split('-', $info['A']);
							$savingRate['MoneyExchangeRate']['date']['month'] = $date[1];
							$savingRate['MoneyExchangeRate']['date']['day'] = $date[0];
							$savingRate['MoneyExchangeRate']['date']['year'] = $date[2];
							$result = $this->MoneyExchangeRate->save($savingRate);
						}
					}
				//	$fileComponent->deleteFile('exchange'.DS.$file_name,'files');
					if($result){
						$this->Session->setFlash(__('El archivo de cambio ha sido importado'));
						$this->redirect(array('action' => 'index'));
					}else{
						$this->Session->setFlash(__('The money exchange rate could not be saved. Please, try again.'));
					}
				}
			}else{
				if ($this->MoneyExchangeRate->save($this->request->data)) {
					$this->Session->setFlash(__('The money exchange rate has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The money exchange rate could not be saved. Please, try again.'));
				}
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
		if (!$this->MoneyExchangeRate->exists($id)) {
			throw new NotFoundException(__('Invalid money exchange rate'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MoneyExchangeRate->save($this->request->data)) {
				$this->Session->setFlash(__('The money exchange rate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The money exchange rate could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MoneyExchangeRate.' . $this->MoneyExchangeRate->primaryKey => $id));
			$this->request->data = $this->MoneyExchangeRate->find('first', $options);
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
		if($id == 0){
			$date = date('Y-m-d');
			$date = date('Y-m-d',strtotime($date . "-15 days"));
			if ($this->MoneyExchangeRate->deleteAll(array('MoneyExchangeRate.date < ' => $date))) {
				$this->Session->setFlash(__('Money exchange rate deleted'));
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash(__('Money exchange rate was not deleted '.$date));
				$this->redirect(array('action' => 'index'));
			}
			
		}else{
			$this->MoneyExchangeRate->id = $id;
			if (!$this->MoneyExchangeRate->exists()) {
				throw new NotFoundException(__('Invalid money exchange rate'));
			}
			$this->request->onlyAllow('post', 'delete');
			if ($this->MoneyExchangeRate->delete()) {
				$this->Session->setFlash(__('Money exchange rate deleted'));
				$this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Money exchange rate was not deleted'));
			$this->redirect(array('action' => 'index'));
		}
	}
}
