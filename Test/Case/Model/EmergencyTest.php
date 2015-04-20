<?php
App::uses('Emergency', 'Model');

/**
 * Emergency Test Case
 *
 */
class EmergencyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.emergency'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Emergency = ClassRegistry::init('Emergency');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Emergency);

		parent::tearDown();
	}

}
