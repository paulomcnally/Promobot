<?php
App::uses('MoneyExchangeRate', 'Model');

/**
 * MoneyExchangeRate Test Case
 *
 */
class MoneyExchangeRateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.money_exchange_rate'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MoneyExchangeRate = ClassRegistry::init('MoneyExchangeRate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MoneyExchangeRate);

		parent::tearDown();
	}

}
