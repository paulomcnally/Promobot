<?php
App::uses('Add', 'Model');

/**
 * Add Test Case
 *
 */
class AddTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.add',
		'app.businesses',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Add = ClassRegistry::init('Add');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Add);

		parent::tearDown();
	}

}
