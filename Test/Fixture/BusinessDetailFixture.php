<?php
/**
 * BusinessDetailFixture
 *
 */
class BusinessDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'direccion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telefono' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'lat' => array('type' => 'float', 'null' => true, 'default' => null),
		'long' => array('type' => 'float', 'null' => true, 'default' => null),
		'businesses_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'cities_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_business_info_business1_idx' => array('column' => 'businesses_id', 'unique' => 0),
			'fk_business_details_cities1_idx' => array('column' => 'cities_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'direccion' => 'Lorem ipsum dolor sit amet',
			'telefono' => 'Lorem ipsum dolor sit amet',
			'lat' => 1,
			'long' => 1,
			'businesses_id' => 1,
			'cities_id' => 1
		),
	);

}
