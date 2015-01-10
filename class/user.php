<?php
require_once(LIB_PATH.DS.'database.php');


class User extends DatabaseObject{
		
		
	protected static $table_name='users';
	
	public $id;
	public $f_name;
	public $l_name;
	public $gender;
	public $address;
	public $contact_number;
	public $email;
	public $password;
	public $status;
	public $date_registered;
	public $type;
	
	private $database;
	
	
	function __construct(){
		global $database;
		$this->database=$database;
		
	}
	public function fullname(){
		
		if(isset($this->f_name) && isset($this->l_name)){
			return $this->f_name ." ". $this->l_name;
		}
		return "";
	
	}
	
	public static function checkEmail($email){
		
		$sql="SELECT * FROM `";
		$sql.= self::$table_name;
		$sql.="` WHERE `email`='{$email}' ";
		
		$result=self::find_by_sql($sql);
		return !empty($result) ? array_shift($result) : false;
	}
	
	public static function authenticate($email,$password){
		global $database;
		
		$sql="SELECT * FROM `";
		$sql.= self::$table_name;
		$sql.="` WHERE `email`='{$email}' AND `password`= '".sha1($password)."'";
		
		$result=self::find_by_sql($sql);
		
		return !empty($result) ? array_shift($result) : false;
	}
	
	public static function validateEmail($email){
		
		return filter_var($email, FILTER_VALIDATE_EMAIL);
   
	}	
}

?>