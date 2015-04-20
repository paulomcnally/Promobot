<?php
App::uses('Petrol', 'Model');

/**
 * Petrol Test Case
 *
 */
class PetrolTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.petrol'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Petrol = ClassRegistry::init('Petrol');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Petrol);

		parent::tearDown();
	}

}
