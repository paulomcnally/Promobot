<?php
App::uses('Wifi', 'Model');

/**
 * Wifi Test Case
 *
 */
class WifiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.wifi',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Wifi = ClassRegistry::init('Wifi');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Wifi);

		parent::tearDown();
	}

}
