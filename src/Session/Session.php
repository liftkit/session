<?php


	namespace LiftKit\Session;

	use LiftKit\Session\Exception\Session as SessionException;
	use ArrayAccess;


	class Session implements ArrayAccess
	{


		public function __construct ($name = null)
		{
			$this->start($name);
		}


		public function start ($name)
		{
			if ($name) {
				session_name($name);
			}

			if (! isset($_SESSION)) {
				if (! headers_sent($file, $line)) {
			    	if (! session_start()) {
			           throw new SessionException(__METHOD__ . ' session_start failed.');
			        }
				} else {
					throw new SessionException(__METHOD__ . ' session started after headers sent. Output began at: ' . $file . ':' . $line);
				}
			}
		}


		public function offsetExists ($variable)
		{
			return isset($_SESSION[$variable]);
		}


		public function & offsetGet ($variable)
		{
			return $_SESSION[$variable];
		}


		public function offsetSet ($variable, $value)
		{
			$_SESSION[$variable] = $value;
		}


		public function offsetUnset ($variable)
		{
			unset($_SESSION[$variable]);
		}


		public function destroy ()
		{
			session_destroy();
		}
	}