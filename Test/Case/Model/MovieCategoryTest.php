<?php
App::uses('MovieCategory', 'Model');

/**
 * MovieCategory Test Case
 *
 */
class MovieCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.movie_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MovieCategory = ClassRegistry::init('MovieCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MovieCategory);

		parent::tearDown();
	}

}
