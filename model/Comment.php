<?php
// require_once '../init.php';

class Comment {

	private $id;
	private $body;
	private $user_id ;
	private $thread_id ;

	function __construct($id="", $body="", $user_id="", $thread_id="") {

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
         	 null,null,null)");
	}
	function addCommentuser($user_id,$thread_id,$body) {
		// 		validate that the category name doesnt exist !!
		         $this->db->makeQuery(
		         	"INSERT into comment VALUES(
         	null,
         	'".$user_id."',
         	'".$thread_id."',
         	'".$body."',
         	 null,null,0)");
	}

	function deleteComment($id) {

		$this->db->makeQuery("DELETE FROM `comment` where id =".$id."");
	}
	function verify(){
			$errors = array() ;
			if(empty($this->body))
				$errors[] = "Please enter the body";
			return $errors;
		}
	function editComment( $body,$editby,$id) {
		$last_update = date("Y-m-d H:i:s") ;
		$this->db->makeQuery("UPDATE comment SET
			`body`='".$body."',
			`last_update`='".$last_update."',
			`edit_by`='".$editby."'
			 WHERE  `id` = '".$id."'");
	}
	function getAllComments($thread_id) {


		// 		$r=$this->db->makeQuery("SELECT * FROM `comment` WHERE `thread_id`=$thread_id");
		$r=$this->db->makeQuery("SELECT comment.id as cid,user.id as uid,comment.edit_by as edit_by,thread_id,image,fname,lname,username,body,comment.created_at ,comment.last_update FROM `comment`,`user` WHERE `thread_id`=$thread_id and `user_id`=user.id");
		return $r;
	}
	function getcommentbyid($id) {


		$r=$this->db->makeQuery("SELECT * FROM `comment` WHERE `id`=$id");
		return $r;
	}
	function getcommentbody($id) {


		$r=$this->db->makeQuery("SELECT body FROM `comment` WHERE `id`=$id");
		return $r;
	}
}

// $c = new Comment(1, "Comment body", 1, 1);
// $c->body = "testtt body ";
// $c->deleteComment();


?>
