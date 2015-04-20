<?php
App::uses('MovieShowtime', 'Model');

/**
 * MovieShowtime Test Case
 *
 */
class MovieShowtimeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.movie_showtime',
		'app.movie_theaters',
		'app.movies'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MovieShowtime = ClassRegistry::init('MovieShowtime');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MovieShowtime);

		parent::tearDown();
	}

}
