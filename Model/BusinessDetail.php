<?php
App::uses('AppModel', 'Model');
/**
 * BusinessDetail Model
 *
 * @property Businesses $Businesses
 * @property Cities $Cities
 */
class BusinessDetail extends AppModel {

	private $_business_delete_id;
        public $displayField = 'direccion';
/** 
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'businesses_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cities_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Business' => array(
			'className' => 'Business',
			'foreignKey' => 'businesses_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'City' => array(
			'className' => 'City',
			'foreignKey' => 'cities_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	/**
	 * hasMany associations
	 * @var array
	 */
	public $hasMany = array(
		'PhoneNumber' => array(
			'className' => 'PhoneNumber',
			'foreignKey' => 'business_details_id',
			'dependant' => true,
			'exclusive' => true
	) );
	
	/**
	 * (non-PHPdoc)
	 * @see Model::afterSave()
	 */
	function afterSave($created,$options = []){
		$this->recursive = -1;
		$businessDetail = $this->find('first',array('conditions' => array('BusinessDetail.id' => $this->id)));
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Model::beforeDelete()
	 */
	function beforeDelete($cascade = true){		
		App::import('Model', 'PhoneNumber');
		$my_model = new PhoneNumber();
		$this->recursive = 1;
		$businessDetail = $this->find('first',array('conditions' => array('BusinessDetail.id' => $this->id)));		
		$this->_business_delete_id = $businessDetail['BusinessDetail']['businesses_id'];
		
		foreach ($businessDetail['PhoneNumber'] as $phone){
			$my_model->delete($phone['id']);
		}
		
		return true;
	}
	
	/**
	 * setBusinessDetail
	 * @param int $id Business id
	 */
	public function setBusinessDetail($id){
		$this->recursive = 1;
		$options = array('conditions' => array('BusinessDetail.businesses_id' => $id),
				'order' => array('BusinessDetail.cities_id'));
		$details = $this->find('all',$options);
		$left = 0;
		$current_city = 0;
		$businessDetail = "";
		$multiple_details = false;
		if(count($details) > 1){
			$multiple_details = true;
		}
		foreach($details as $detail){
			if($current_city != $detail['BusinessDetail']['cities_id']){
				if($businessDetail != ""){
					$businessDetail .= "</span></div></div>";
				}
				$businessDetail .= "<div class='business-details' style='left: ".$left."%;'>";
				if($multiple_details){
					$businessDetail .= "<div style='width: 10%; margin-top: 50%; height: 50%;'><img style='width: 50%;' src='../res/images/arrow_left.png'></div>";
					$businessDetail .= "<div style='float: right; width: 10%; margin-left: 91%; margin-top: 50%; height: 50%;'><img style='width: 50%;' src='../res/images/arrow.png'></div>";
				}
				$businessDetail .= "<div class='business-details-inner'>";
				$left = $left + 100;
				$current_city = $detail['BusinessDetail']['cities_id'];
				if($detail['BusinessDetail']['telefono'] != ""){
					$businessDetail .= "<span class='business-detail-title'>Tel&eacute;fono</br></span><span class='business-detail-item' onclick=makeCall('".$detail['BusinessDetail']['telefono']."');>".$detail['BusinessDetail']['telefono']."</br></span></br>";
				}
				$businessDetail .= "<span class='business-detail-title'>";
				if($detail['BusinessDetail']['direccion'] != '')
					$businessDetail .= $detail['City']['name'];
				$businessDetail .= "</br></span>";
				$businessDetail .= "<span class='business-detail-item'>";
			}
			$businessDetail .= $detail['BusinessDetail']['direccion']." </br>";
			foreach($detail['PhoneNumber'] as $phoneNumber)
				$businessDetail .= "<span class='phone-number' onclick=makeCall('".$phoneNumber['phone_number']."');>Tel: ".$phoneNumber['phone_number']."</span> </br>";
			$businessDetail .= "</br>";
		}
		if($businessDetail != ''){
			$businessDetail .= "</span></div></div>";
		}
		$business = $this->Business->find('first',array('conditions' => array('Business.id' => $id)));
		$business['Business']['details'] = $businessDetail;
		$this->Business->save($business['Business']);
	}
	
	
	/**
	 * Update phone number, remove (505)
	 */
	public function updatePhoneNumbers(){
		$details = $this->find('all');
		foreach($details as $detail){
			if($detail['BusinessDetail']['telefono'] != ''){
				$detail['BusinessDetail']['telefono'] = str_replace('(505)', '+505', $detail['BusinessDetail']['telefono']);
				$detail['BusinessDetail']['telefono'] = str_replace('+505 ', '+505', $detail['BusinessDetail']['telefono']);
				$this->save($detail['BusinessDetail']);
			}
		}
	}
}