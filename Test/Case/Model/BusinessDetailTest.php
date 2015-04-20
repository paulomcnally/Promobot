<?php
App::uses('BusinessDetail', 'Model');

/**
 * BusinessDetail Test Case
 *
 */
class BusinessDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.business_detail',
		'app.businesses',
		'app.cities'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BusinessDetail = ClassRegistry::init('BusinessDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BusinessDetail);

		parent::tearDown();
	}

}
