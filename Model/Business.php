<?php
App::uses('AppModel', 'Model');
/**
 * Business Model
 *
 * @property Categories $Categories
 * @property Users $User
 * @property BusinessDetail $BusinessDetails
 * @property Image $Images
 */
class Business extends AppModel {
	
	public $actsAs = array('Linkable','Containable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'categories_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'users_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
// 		'image' => array(
// 			'notempty' => array(
// 				'rule' => array('notempty'),
// 				//'message' => 'Your custom message here',
// 				//'allowEmpty' => false,
// 				//'required' => false,
// 				//'last' => false, // Stop validation after this rule
// 				'on' => 'create' // Limit validation to 'create' or 'update' operations
// 			),
// 		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create' // Limit validation to 'create' or 'update' operations
			),
		),
// 		'logo' => array(
// 			'notempty' => array(
// 				'rule' => array('notempty'),
// 				//'message' => 'Your custom message here',
// 				//'allowEmpty' => false,
// 				//'required' => false,
// 				//'last' => false, // Stop validation after this rule
// 				'on' => 'create' // Limit validation to 'create' or 'update' operations
// 			),
// 		),
// 		'descripcion' => array(
// 			'notempty' => array(
// 				'rule' => array('notempty'),
// 				//'message' => 'Your custom message here',
// 				//'allowEmpty' => false,
// 				//'required' => false,
// 				//'last' => false, // Stop validation after this rule
// 				//'on' => 'create' // Limit validation to 'create' or 'update' operations
// 			),
// 		),
			
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	var $hasAndBelongsToMany = array(
			'Category' => array(
					'className' => 'Category',
					'joinTable' => 'businesses_has_categories',
					'foreignKey' => 'businesses_id',
					'associationForeignKey' => 'categories_id',
					'unique' => true,
			)
	);
	
	public $hasMany = array(
			'BusinessDetail' => array(
					'className' => 'BusinessDetail',
					'foreignKey' => 'businesses_id',
					'dependant' => true,
					'exclusive' => true
			),
			'Image' => array(
					'className' => 'Image',
					'foreignKey' => 'businesses_id'
			),
                        'Promotion' => array(
					'className' => 'Promotion',
					'foreignKey' => 'businesses_id',
                                        'dependant' => true,
					'exclusive' => true
                        )
	 );
	

	
	/**
	 * Get Business by category id
	 * @param int $id
	 * @return array business
	 */
	public function getBusinessByCategoryId($id){
		$options = array('joins' => array(
				array(
						'table' => 'businesses_has_categories',
						'alias' => 'bhc',
						'type' => 'inner',
						'foreignKey' => false,
						'conditions'=> array('bhc.businesses_id = Business.id')
				),
				array(
						'table' => 'categories',
						'alias' => 'c',
						'type' => 'inner',
						'foreignKey' => false,
						'conditions'=> array(
								'c.id = bhc.categories_id',
								'c.id' => $id
						)
				)
		));
		return $this->find('all',$options);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Model::beforeDelete()
	 */
	function beforeDelete($cascade = true){
		App::import('Model', 'BusinessDetail');
		$my_model = new BusinessDetail();
		$continue = parent::beforeDelete($cascade);
		$this->recursive = 1;
		$business = $this->find('first',array('conditions' => array('Business.id' => $this->id)));		
		foreach ($business['BusinessDetail'] as $businessDetails){
			$my_model->delete($businessDetails['id'],true);
		}
		return true;
	}
}
