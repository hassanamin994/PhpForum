<?php
// require_once '../init.php';

class Thread {

	private $id;
	private $title;
	private $description;
	private $forum_id ;
	private $user_id ;
	private $locked;
	private $sticky ;

	function __construct($id=0, $title=0, $description=0, $forum_id=0, $user_id=0, $locked = 0,$sticky=0) {

		$this->db = new DBManager();
		$this->id = $id;
		$this->title = trim($title) ;
		$this->description = trim($description) ;
		$this->forum_id = $forum_id ;
		$this->user_id = $user_id ;
		$this->locked = $locked ;
		$this->sticky = $sticky;
	}

	function __set($field, $value) {
		$this->$field = $value;
	}

	function __get($field) {
		return $this->$field;
	}

	function addThread() {
		$t=date("Y-m-d H:i:s");

         $this->db->makeQuery(
         	"INSERT into thread VALUES(
         	null,

         	'".$this->title."',
         	'".$this->description."',
         	'".$this->locked."',
         	'".$this->forum_id."',

         	'".$this->user_id."',
         	0,
         	null,
         	null,null)");
	}

	function deleteThread() {

		$this->db->makeQuery("DELETE FROM `thread` where id ='" . $this->id . "'");
	}

	function editThread() {
		$last_update = date("Y-m-d H:i:s") ;
		$this->db->makeQuery("UPDATE thread SET
			`title`='".$this->title."',
			`description`='".$this->description."',
			`forum_id`='".$this->forum_id."',
			`last_update`='".$last_update."',
			`locked` ='".$this->locked."',
			`user_id`='".$this->user_id."',
			`sticky`='".$this->sticky."'
			 WHERE  `id` = '".$this->id."'");
	}
	function updateThread($id,$title,$description,$editby) {
		$last_update = date("Y-m-d H:i:s") ;
		$this->db->makeQuery("UPDATE `thread` SET
			`title`= '".$title."',
			`description`='".$description."',
			`last_update`='".$last_update."',
			`edit_by`='".$editby."'

			 WHERE  `id`=$id");
	}

function toggleLock(){
		$this->locked = $this->locked == 0 ? 1 : 0 ;
		$this->editThread();
	}
	function toggleStick(){
		$this->sticky = $this->sticky == 0 ? 1 : 0 ;
		$this->editThread();
	}
	function verify(){
			$errors = array() ;
			if(empty($this->title))
				$errors[] = "Enter the Thread Title" ;
			if(empty($this->description)){
				$errors[] = "Enter the Thread Description";
			}
			return $errors;
	}
}


?>
