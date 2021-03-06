<?php
require_once(LIB_PATH.DS.'database.php');


class User extends DatabaseObject{
		
		
	protected static $table_name='users';
	
	
	
	
	protected static $db_fields=array('id', 'f_name', 'l_name', 'gender', 'address','contact_number','email','password','status','date_registered','type');
	
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
	
	
	/*function __construct(){
		global $database;
		parent:: __construct();
		$this->database=$database;
	}*/
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
	
	public static function getDataFields(){
		global $database;
		
		$sql="Describe ". self::$table_name;
		
		$result= $database->query($sql);
		
		
		$field=array();
		
		while($row=$database->fetch_array($result)){
			$field["{$row['Field']}"]=null;
		}
		echo '<pre>';
		print_r($field);
		echo '</pre>';
	}
}



?>