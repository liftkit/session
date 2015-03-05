<?php


	namespace LiftKit\Tests\Unit\Session;

	use LiftKit\Tests\Helpers\Session\TestCase;
	use LiftKit\Tests\Stub\Session\Session;


	class SessionTest extends TestCase
	{
		/**
		 * @var Session
		 */
		protected $session;


		public function setUp ()
		{
			$this->session = new Session(array(
				'value1' => 1,
				'value2' => 2,
			));
		}


		public function testSetGetUnsetSession ()
		{
			$this->session['value3'] = 3;
			
			$this->assertEquals(
				3,
				$this->session['value3']
			);

			$this->assertTrue(isset($this->session['value3']));

			unset($this->session['value3']);

			$this->assertFalse(isset($this->session['value3']));
		}
	}