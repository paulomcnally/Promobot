<?php
/**
 * PetrolPriceFixture
 *
 */
class PetrolPriceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'precio' => array('type' => 'float', 'null' => true, 'default' => null),
		'petrol_categories_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'petrols_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_petrol_prices_petrol_categories1_idx' => array('column' => 'petrol_categories_id', 'unique' => 0),
			'fk_petrol_prices_petrols1_idx' => array('column' => 'petrols_id', 'unique' => 0)
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
			'precio' => 1,
			'petrol_categories_id' => 1,
			'petrols_id' => 1
		),
	);

}
