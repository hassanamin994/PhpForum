<?php
// require_once '../init.php';

class Comment {
	
	private $id;
	private $body;
	private $user_id ;
	private $thread_id ;
	
	function __construct($id, $body, $user_id, $thread_id) {
		
		$this->db = new DBManager();
		$this->id = $id;
		$this->body = $body;
		$this->user_id = $user_id;
		$this->thread_id = $thread_id;
	}
	
	function __set($field, $value) {
		$this->$field = $value;
	}
	
	function __get($field) {
		return $this->$field;
	}
	
	function addComment() {
		// 		validate that the category name doesnt exist !!
         $this->db->makeQuery(
         	"INSERT into comment VALUES(
         	null,
         	'".$this->user_id."',
         	'".$this->thread_id."',
         	'".$this->body."',
         	 null,null)");
	}
	
	function deleteComment() {
		
		$this->db->makeQuery("DELETE FROM `comment` where id ='" . $this->id . "'");
	}
	
	function editComment() {
		
		$this->db->makeQuery("UPDATE comment SET 
			`body`='".$this->body."',
			`thread_id`='".$this->thread_id."',
			`user_id`='".$this->user_id."'
			 WHERE  `id` = '".$this->id."'");
	}
}

// $c = new Comment(1, "Comment body", 1, 1);
// $c->body = "testtt body ";
// $c->deleteComment();


?>