<?php
class DatabaseObject{


	//protected static $db_fields=array();
	
	public static function find_all(){
		global $database;
		$sql="SELECT * FROM `".static::$table_name. "`";
		
		return self::find_by_sql($sql);
	}
	
	public static function find_by_id($id=0){
		global $database;
		$sql="SELECT * FROM `".static::$table_name."` WHERE id={$id}";
		$result=self::find_by_sql($sql);
		return !empty($result) ? array_shift($result) : false;
	}
	
	public static function find_by_sql($sql){
		global $database;
		$result=$database->query($sql);
		
		$object_var = array();
		while($row= $database->fetch_array($result)){
			$object_var[]=self::instantiate($row);
		}
		return $object_var;
	}
				
	private static function instantiate($record) {
		 $getClass= get_called_class();
		 $object = new $getClass;
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		  	  $object->$attribute = $value;
		  }
		}
		return $object;
	}
	
	private function has_attribute($attribute) {
		
		return array_key_exists($attribute, $this->attributes() );
	}
	
	
	
	private function attributes(){
		$attributes = array();
		
		global $database;
		
		$sql="Describe ". static::$table_name;
		
		$result= $database->query($sql);
		
		while($row=$database->fetch_array($result)){
			if(property_exists($this, $row['Field'])) {
				$attributes["{$row['Field']}"]=$this->$row['Field'];
			}
		}
		return $attributes;
	
	}
	
	private function sanitized_attributes(){
		global $database;
		$clean_attributes=array();
		foreach($this->attributes() as $key => $value){
			$clean_attributes[$key]= $database->escape_value($value);
		}
		
		return $clean_attributes;	
	}
		
	public function save() {
	  return isset($this->id) ? $this->update() : $this->create();
	}
	
	public function create(){
		global $database;
		
		$attributes = $this->sanitized_attributes();
		
		$sql="INSERT INTO `";
		$sql.= static::$table_name;
		$sql.="` (".join(", ",array_keys($attributes) ).")";
		
		$sql.=" VALUES ('".join("', '",array_values($attributes) )."')";
		
		if($database->query($sql)){
			$this->id=$database->insert_id();
			return true;
		}
		else
			return false;
	}
	
	public function update(){
		global $database;
		$attributes= $this->sanitized_attributes();
		$last = end($attributes);
		$last = each($attributes);
		reset($attributes);
		$sql="UPDATE `";
		$sql.=static::$table_name;
		$sql.="` SET ";
		
		foreach($attributes as $key => $value){
			
			if($key != 'id'){
				$sql.=" ".$key."="."'".$value."'";
				if($key!==$last['key']){
					$sql.=", ";
				}
			}
		}
		$sql.=" WHERE `id` = ".$this->id;
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	public function delete(){
		global $database;
		$sql="DELETE FROM `";
		$sql.= static::$table_name;
		//$sql.="` WHERE id = ".$this->id;
		$sql.="` WHERE `id` = ".$this->id;
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
		
	}
	
	
}
?>