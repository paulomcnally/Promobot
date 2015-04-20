<?php
App::uses('PetrolCategory', 'Model');

/**
 * PetrolCategory Test Case
 *
 */
class PetrolCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.petrol_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PetrolCategory = ClassRegistry::init('PetrolCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PetrolCategory);

		parent::tearDown();
	}

}
