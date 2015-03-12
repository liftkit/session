<?php


	namespace LiftKit\Tests\Stub\Session;

	use LiftKit\Session\Session as BaseSession;


	class Session extends BaseSession
	{


		public function __construct ($initialValue = array())
		{
			$_SESSION = $initialValue;
		}


		public function start ()
		{
			$_SESSION = array();
		}


		public function destroy ()
		{
			unset($_SESSION);
		}
	}