<?php
require_once '../init.php';

class Category {

	private $id;
	private $name;

	function __construct($id, $name) {

		$this->db = new DBManager();
		$this->id = $id;
		$this->name = trim($name);
	}

	function __set($field, $value) {
		$this->$field = $value;
	}

	function __get($field) {
		return $this->$field;
	}

	function addcategory() {
		// 		validate that the category name doesnt exist !!
         $this->db->makeQuery("INSERT into category VALUES(null,'" . $this->name . "',null,null)");
	}

	function deletecategory() {

		$this->db->makeQuery("DELETE FROM `category` where id ='" . $this->id . "'");
	}

	function editcategory() {

		$this->db->makeQuery("UPDATE `category` SET `name`='" . $this->name . "' WHERE  id='" . $this->id . "'");
	}
	function verify($type='add'){
			$errors = array() ;
			if(empty($this->name))
				$errors[] = "Enter the category name" ;
			else{
				if($type == 'add'){
					$category = $this->db->makeQuery("SELECT name from category WHERE name='".$this->name."'") ;
					if(!empty($category))
						$errors[] = "Category name Already exists" ;
				}
			}
			return $errors;
	}


}

?>
