<?php
App::uses('EmergencyPhone', 'Model');

/**
 * EmergencyPhone Test Case
 *
 */
class EmergencyPhoneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.emergency_phone',
		'app.emergencies'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmergencyPhone = ClassRegistry::init('EmergencyPhone');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmergencyPhone);

		parent::tearDown();
	}

}
