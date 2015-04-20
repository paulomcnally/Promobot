<?php
App::uses('Taxi', 'Model');

/**
 * Taxi Test Case
 *
 */
class TaxiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.taxi'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Taxi = ClassRegistry::init('Taxi');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Taxi);

		parent::tearDown();
	}

}
