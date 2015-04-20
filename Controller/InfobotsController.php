<?php
App::uses('AppController', 'Controller');
/**
 * Infobots Controller
 *
 * @property Infobots $Infobots
*/
class InfobotsController extends AppController {
	/**
	 * Components used by infobots controller
	 * @var $components
	 */
	public $components = array('RequestHandler');
	
	/**
	 * Get daily info
	 */
	public function info(){
		$this->setPetrolPrices();
		$this->getExchange();
		$this->setMovies();
		$this->loadModel('AppMessage');
		$message = $this->AppMessage->find('first',array('order' => array('id' => 'DESC')));
		if($message['AppMessage']['mensaje'] != '')
			$this->set(compact('message'));
	}
	
	/**
	 * Get Dolar Exchange rate
	 */
	public function getExchange(){
		$params = json_decode($this->request->data('params'),true);
		if(isset($params['date'])){
			$date = $params['date'];
		}else 
			$date = null;
		$this->setDollarExchange($date);
	}
	
	public function getPetrolPrices(){
		$this->setPetrolPrices();
	}
	
	public function getMovies(){
		$this->setMovies();
	}
	
	/**
	 * Set Petrol Prices
	 */
	private function setPetrolPrices(){
		$this->loadModel('Petrol');
		$this->Petrol->recursive = 2;
		$petrols = $this->Petrol->find('all');
		$this->set(compact('petrols'));
	}
	
	/**
	 * Get petrol map info
	 */
	public function getGasInfo(){
		$file = Router::url('/', true)."app/webroot/files/gasolina.json";
		$json = file_get_contents($file);
		$this->set(compact('json'));
	}
	
	/**
	 * Set Dollar Exchange
	 */
	private function setDollarExchange($date = null){
		if($date == null){
			$date = date('Y/m/d');
		}
		
		$this->loadModel('MoneyExchangeRate');
		$options = array('conditions' => array('MoneyExchangeRate.date > ' => $date),'order' => array('MoneyExchangeRate.date ASC'));
		$moneyExchange = $this->MoneyExchangeRate->find('all',$options);
		foreach($moneyExchange as &$exchange){
			if(strlen($exchange['MoneyExchangeRate']['cambio']) < 7)
				$exchange['MoneyExchangeRate']['cambio'] = $exchange['MoneyExchangeRate']['cambio']."0";
		}
		$this->set(compact('moneyExchange'));
	}
	
	/**
	 * Set Movies
	 */
	private function setMovies(){
		$this->loadModel('MovieTheaterBrand');
		$movieTheaterBrands = $this->MovieTheaterBrand->find('all');
		$this->loadModel('MovieTheater');		
		$theaters = $this->MovieTheater->find('all');
				
		$this->loadModel('Movie');
		$this->loadModel('MovieShowtime');
		$this->Movie->recursive = 0;
		$this->MovieShowtime->recursive = -1;
		$this->MovieTheater->recursive = 0;
		$options = array('conditions' => array('Movie.from <' => date('Y-m-d H:i:s'),'Movie.to >' => date('Y-m-d H:i:s')),'order' => array('Movie.to DESC'));
		$movies = $this->Movie->find('all',$options);		
		$i = 0;
		foreach($theaters as $theater){
			foreach($movies as &$movie){
				$options = array('conditions' => array('MovieShowtime.movies_id' => $movie['Movie']['id'], 'MovieShowtime.movie_theaters_id' => $theater['MovieTheater']['id']));
				$showtime = $this->MovieShowtime->find('all',$options);
				$movie['showtime'][$i]['cine'] = $theater['MovieTheater']['name'];
				$movie['showtime'][$i]['theater_brand_id'] = $theater['MovieTheater']['movie_theater_brands_id'];
				$movie['showtime'][$i]['info'] = $showtime;		
			}
			$i++;
		}		
		$this->set(compact('movies','movieTheaterBrands'));
	}
	
	/**
	 * Get data for app db update
	 */
	public function getUpdateData(){
		$params = $this->getRequestParams();
		$this->loadModel('City');
		$this->loadModel('Version');
		$this->loadModel('Business');
		$this->loadModel('Emergency');
		$this->loadModel('Taxi');
		$this->loadModel('Category');
		$this->loadModel('BusinessDetail');
		$this->BusinessDetail->recursive = 1;
		
		$this->log("Last update: ".$params['last_update'],'debug');
		
		if(isset($params['last_update']))
			$current_date = $params['last_update'];
		else
			$current_date = date('Y/m/d');
		$new_business = $this->Business->find('all',array(
				'conditions' => array(
				'Business.created >' => $current_date
				)
		));
		
		$option = array('conditions' => array(
				'Business.created <' => $current_date,
				'Business.modified >=' => $current_date)
		);
		$business = $this->Business->find('all',$option);
		$new_categories = $this->Category->find('all',array(
				'conditions' => array(
						'Category.created >' => $current_date
				)
		));
		$categories = $this->Category->find('all',array(
				'conditions' => array(
						'Category.created <' => $current_date,
						'Category.modified >' => $current_date
				)
		));
		$option = array('conditions' => array(
				'BusinessDetail.created >' => $current_date)
		);
		$new_business_details = $this->BusinessDetail->find('all',$option);
		$option = array('conditions' => array(
				'BusinessDetail.created <' => $current_date,
				'BusinessDetail.modified >' => $current_date)
		);
		$business_details = $this->BusinessDetail->find('all',$option);
		$business_details = array_merge($business_details, $new_business_details);
		$new_cities = $this->City->find('all',array(
				'conditions' => array(
					'City.created >' => $current_date
				)
		));
		$cities = $this->City->find('all',array(
				'conditions' => array(
					'City.created <' => $current_date,
					'City.modified >' => $current_date
				)
		));
		$new_emergencies = $this->Emergency->find('all',array(
				'conditions' => array(
						'Emergency.created >' => $current_date
				)
		));
		$emergencies = $this->Emergency->find('all',array(
				'conditions' => array(
					'Emergency.created < ' => $current_date,
					'Emergency.modified >' => $current_date
				)
		));
		$new_taxis = $this->Taxi->find('all',array(
				'conditions' => array(
					'Taxi.created >' => $current_date
				)
		));
		$taxis = $this->Taxi->find('all',array(
				'conditions' => array(
						'Taxi.created < ' => $current_date,
						'Taxi.modified >' => $current_date
				)
		));
		$this->set(compact('new_business','business','new_categories','categories','new_cities','cities',
				'new_emergencies','emergencies','new_taxis','taxis','current_version','business_details'));
	}
	
	/**
	 * login method
	 */
	public function login(){
		$this->logout();
		$response['success'] = false;
		if($this->Auth->login()){
			$this->loadModel('User');
			$this->User->recursive = -1;
			$response['success'] = true;
			$params = json_decode($this->request->query('params'),true);
			$options = array('conditions' => array('User.username' => $params['username']));
			$result = $this->User->find('first', $options);
			unset($result['User']['password']);
			unset($result['User']['created']);
			unset($result['User']['login_date']);
			unset($result['User']['groups_id']);
			unset($result['User']['id']);
			error_log('User: '.json_encode($result));
			$response['user'] = $result['User'];
		}
		$this->set(compact('response'));
	}
	
	/**
	 * logout method
	 */
	public function logout(){
		$this->Auth->logout();
	}
	
	
	/**
	 * Set Message from app
	 */
	public function setMessage(){
		$params = $this->getRequestParams();
		$this->loadModel('Message');
		
		$Email = new CakeEmail();
		$Email->from($params['email']);
		$Email->to(array('javier@sh-apps.com','albert@sh-apps.com','kike@sh-apps.com'));
		$Email->subject("Contacto");
		$response['email'] = $Email->send('Mensaje: '.$params['message']);
		
		$message['Message']['email'] = $params['email'];
		$message['Message']['sent'] = 1;
		$message['Message']['message'] = $params['message'];
		
		if($this->Message->save($message))
			$response['save'] = 1;
		else
			$response['save'] = 0;
		$this->set(compact('response'));
	}
	
	/**
	 * Set error from app
	 */
	public function setError(){
		$params = $this->getRequestParams();
		$this->loadModel('Error');
		
		$Email = new CakeEmail();
		$Email->from('javier@sh-apps.com');
		$Email->to(array('javier@sh-apps.com','albert@sh-apps.com','kike@sh-apps.com'));
		$Email->subject("Error");
		$response['email'] = $Email->send('Mensaje: '.$params['negocio']." / ".$params['message']);
		
		$error['Error']['negocio'] = $params['negocio'];
		$error['Error']['error'] = $params['message'];
		
		if($this->Error->save($error))
			$response['save'] = 1;
		else
			$response['save'] = 0;
		$this->set(compact('response'));
	}
	
	/**
	 * Generate random password
	 * @return string
	 */
	private function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 6; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
	
	/**
	 * Get add method
	 */
	public function getAdd(){
		$this->loadModel('Add');
		$this->Add->recursive = -1;
		$params = $this->getRequestParams();
		$positions = $params['positions'];
		if(!is_array($positions)){
			$positions = explode(",", $positions);
		}
		$response = array();
		foreach($positions as $position){
			$options = array('joins' => array(
					array(
							'table' => 'adds_has_positions',
							'alias' => 'ahp',
							'type' => 'inner',
							'foreignKey' => false,
							'conditions'=> array('ahp.add_id = Add.id')
					),
					array(
							'table' => 'positions',
							'alias' => 'p',
							'type' => 'inner',
							'foreignKey' => false,
							'conditions'=> array(
									'p.id = ahp.position_id',
									'p.position' => $position
							)
					)
			),
					'fields' => array('p.position','Add.*'),
					'order' => 'Add.ultimo_display asc',
					'limit' => $params['limit']
			);
			$result = $this->Add->find('all',$options);
			if($result){
				$add = $result[0]['Add'];
				$add['ultimo_display'] = date('Y-m-d H:i:s');
				$add['display_no'] = $add['display_no'] + 1;
				$this->Add->save($add);
				array_push($response, $result);
			}
		}
		$this->set(compact('response'));
	}
	
	public function taxiLogin(){
		$this->loadModel('Taxi');
		$params = $this->getRequestParams();
		$taxi_username = $params['taxi_username'];
		$password = $params['taxi_password'];
		
		$this->Taxi->recursive = -1;
		$result = $this->Taxi->find("first",array("conditions" => array("Taxi.username" => $taxi_username)));

		$login = "0";
		if($result['Taxi']['password'] == $password){
			$login = $result['Taxi']['id'];			
		}
		unset($result['Taxi']['password']);
		$this->set(compact('result'));
		$this->set(compact('login'));
	}
	
	public function taxiSetActive(){
		$this->loadModel('Taxi');
		$params = $this->getRequestParams();
		$this->Taxi->recursive = -1;
		$options = array('conditions' => array('Taxi.' . $this->Taxi->primaryKey => $params['taxi_id']));
		$taxi = $this->Taxi->find("first",$options);
		$taxi['Taxi']['activo'] = $params['taxi_active'];
		unset($taxi['Taxi']['password']);
		
		$response = "0";
		$this->log("Set Active: ".json_encode($taxi),'debug');
		if ($this->Taxi->save($taxi)) {
			$response = "1";
		}		
		$this->set(compact('response'));
	}
	
	public function taxiSetLocation(){
		$this->loadModel('TaxiLocation');
		$this->TaxiLocation->recursive = -1;
		$params = $this->getRequestParams();		
		
		$taxiLocation['TaxiLocation']['taxi_id'] = $params['taxi_id'];
		$taxiLocation['TaxiLocation']['lat'] = $params['taxi_lat'];
		$taxiLocation['TaxiLocation']['lon'] = $params['taxi_lon'];
		
		$this->TaxiLocation->save($taxiLocation);					
		
		$this->loadModel('Taxi');
		$params = $this->getRequestParams();
		$this->Taxi->recursive = -1;
		$options = array('conditions' => array('Taxi.' . $this->Taxi->primaryKey => $params['taxi_id']));
		$taxi = $this->Taxi->find("first",$options);		
		unset($taxi['Taxi']['password']);
			
		
		$taxi['Taxi']['lat'] = $params['taxi_lat'];
		$taxi['Taxi']['lon'] = $params['taxi_lon'];
		
		$this->log("Set Location: ".json_encode($taxi),'debug');
		
		$response = "0";
		if(isset($taxi['Taxi']['id'])){			
			if ($this->Taxi->save($taxi)) {
				$response = "1";
			}
		}
		
		$this->set(compact('response'));
	}
	
	public function getNearTaxis(){
		$this->loadModel('Taxi');
		$params = $this->getRequestParams();
		$response = $this->Taxi->getNearTaxis($params['taxi_lat'],$params['taxi_lon']);		
		$this->set(compact('response'));
	}
	
	
	public function beforeFilter() {
		$this->log(json_encode($this->getRequestParams()),'debug');
		parent::beforeFilter();
		$this->Auth->allow('login','addUser','resetPassword','logout');
		$this->Auth->login();
	}
	
	/**
	 * Get Request Params
	 * @return mixed
	 */
	private function getRequestParams(){
		$params = json_decode($this->request->query('params'),true);
		if(!isset($params['username']))
			$params = json_decode($this->request->data('params'),true);
		
		return $params;
	}
}