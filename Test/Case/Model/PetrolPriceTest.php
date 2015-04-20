<?php
App::uses('PetrolPrice', 'Model');

/**
 * PetrolPrice Test Case
 *
 */
class PetrolPriceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.petrol_price',
		'app.petrol_categories',
		'app.petrols'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PetrolPrice = ClassRegistry::init('PetrolPrice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PetrolPrice);

		parent::tearDown();
	}

}
