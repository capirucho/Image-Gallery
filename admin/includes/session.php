<?php


/**
* 
*/
class Session 
{
	
	private $signedIn = false;
	public $id;
	public $message;


	function __construct()
	{
		session_start();
		$this->checkTheLogin();
		$this->checkMessage();
	}

	public function message($msg = "") {
		if(!empty($msg)) {
			$_SESSION['message'] = $msg;
		} else {
			return $this->message;
		}
	}

	public function checkMessage() {
		if(isset($_SESSION['message'])) {
			$this->message = $_SESSION['message'];
			unset($_SESSION['message']);
		} else {
			$this->message = "";
		}
	}

	public function isSignedIn() {
		return $this->signedIn;
	}

	public function login($user) {
		if ($user) {
			$this->id = $_SESSION['id'] = $user->id;
			$this->signedIn = true;
		}
	}

	public function logout() {
		unset($_SESSION['id']);
		unset($this->id);
		$this->signedIn = false;
	}

	private function checkTheLogin() {

		if(isset($_SESSION['id'])) {
			$this->id = $_SESSION['id'];
			$this->signedIn = true;
		} else {
			unset($this->id);
			$this->signedIn = false;
		}

	}
}

$session = new Session();












?>