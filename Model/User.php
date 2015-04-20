<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Groups $Groups
 */
class User extends AppModel {

	public $virtualFields = array("full_name"=>"CONCAT(`User`.`nombre`, ' ' ,`User`.`apellido`)");
	public $displayField = 'full_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
				'notempty' => array(
						'rule' => array('notempty'),
						//'message' => 'Your custom message here',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'unique' => array(
						'rule'    => 'isUnique',
						'message' => 'This username has already been taken.'
				)
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'apellido' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'groups_id' => array(
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
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'groups_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * AclBehavior
 * @var $actAs
 */
	public $actsAs = array('Acl' => array('type' => 'requester'));
	
/**
 * beforeSave method
 * @property $options array
 * @see Model::beforeSave()
 * @return bool
 */
	public function beforeSave($options = array()) {		
		if(isset($this->data['User']['password']))
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		return true;
	}
	
/**
 * parentNode method
 * @return NULL|multitype:multitype:array
 */
	public function parentNode(){
		if(!$this->id && empty($this->data)){
			return null;
		}
		if(isset($this->data['User']['groups_id'])){
			$groupId = $this->data['User']['groups_id'];
		}
		if(!$groupId){
			return null;
		}else{
			return array('Group' => array('id' => $groupId));
		}
	}
}
