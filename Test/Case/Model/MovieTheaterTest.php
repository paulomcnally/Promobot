<?php
App::uses('MovieTheater', 'Model');

/**
 * MovieTheater Test Case
 *
 */
class MovieTheaterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.movie_theater'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MovieTheater = ClassRegistry::init('MovieTheater');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MovieTheater);

		parent::tearDown();
	}

}
