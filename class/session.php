<?php
class Session {
	
	private $logged_in=false;
	private $message;
	public $user_id;
	public $type;
	
	function __construct() {
		session_start();
		$this->check_login();
		$this->check_message();
	}
	
  	public function is_logged_in() {
    	return $this->logged_in;
  	}

	public function login($user) {
    
    	if($user){
      		$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->type = $_SESSION['type'] = $user->type;
      		$this->logged_in = true;
    	}
  	}
  
 	public function logout() {
   	 	unset($_SESSION['user_id']);
		unset($_SESSION['type']);
    	unset($this->user_id);
    	session_destroy();
		$this->logged_in = false;
  	}

	private function check_login() {
    	if(isset($_SESSION['user_id'])) {
      		$this->user_id = $_SESSION['user_id'];
			$this->type = $_SESSION['type'];
      		$this->logged_in = true;
    	}
		else {
      		unset($this->user_id);
			unset($this->type);
      		$this->logged_in = false;
    	}
 	}
	
	public function message($msg=""){
		if(!empty($msg)){
			$_SESSION['message']=$msg;
		}
		else
			return $this->message;
	}
	private function check_message(){
		if(isset($_SESSION['message'])){
			$this->message=$_SESSION['message'];
			unset($_SESSION['message']);
		}
		else{
			$this->message="";
		}
	}
  
}

$session = new Session();
$message = $session->message();
?>