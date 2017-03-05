<?php
// require_once '../init.php';

class Forum {

	private $id;
	private $name;
	private $locked;
	private $category_id ;

	function __construct($id, $name,$category_id,$locked = 0) {

		$this->db = new DBManager();
		$this->id = $id;
		$this->name = trim($name);
		$this->locked = $locked ;
		$this->category_id = $category_id ;
	}

	function __set($field, $value) {
		$this->$field = $value;
	}

	function __get($field) {
		return $this->$field;
	}

	function addForum() {
		// 		validate that the category name doesnt exist !!
         $this->db->makeQuery("INSERT into forum VALUES(null,'" . $this->name . "','".$this->locked."','".$this->category_id."',null,null)");
	}

	function deleteForum() {

		$this->db->makeQuery("DELETE FROM `forum` where id ='" . $this->id . "'");
	}

	function editForum() {

		$this->db->makeQuery("UPDATE forum SET
			`name`='".$this->name."',
			`locked` ='".$this->locked."',
			`category_id`='".$this->category_id."'
			 WHERE  `id` = '".$this->id."'");
	}
	function verify(){
			$errors = array() ;
			if(empty($this->name))
				$errors[] = "Enter the Forum name" ;
			else{
				if(empty($this->category_id))
					$errors[] = "Select the category" ;
				else{
					$category = $this->db->makeQuery("SELECT name from forum WHERE name='".$this->name."'") ;
					if(!empty($category))
						$errors[] = "Forum name Already exists" ;
				}
			}
			return $errors;
	}
	function toggleLock(){
		$this->locked = $this->locked == 0 ? 1 : 0 ;
		$this->editForum();
	}

}

// $f = new Forum(3,"testforum",1);
// $f->category_id = 4 ;
// echo $f->category_id;
// $f->deleteForum();



?>
