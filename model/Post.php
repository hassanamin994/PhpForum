<?php


class Post{
	
	private $id ;
	private $db ;
	private $title;
	private $description;
	private $user_id;
	private $user_name ;
	function __construct($id,$title,$description){
		$this->db = new DBManager() ;
		$this->id=$id;
		$this->title = $title;
		$this->description = $description;
	}
	
	function __set($field,$value){
		$this->$field = $value ;
	}
	
	function __get($field){
		return $this->$field ;
	}
	
	
	
	function publish($user_id,$user_name){
		$this->db->makeQuery("INSERT into post VALUES(null,'".$this->title."','".$this->description."',null,'".$user_id."','".$user_name."',null)") ;
	}
	function update(){
		$this->db->makeQuery("Update post set `title` ='".$this->title."', `description` = '".$this->description."' where `id` = '".$this->id."'");
	}
	function delete(){
		$this->db->makeQuery("DELETE FROM post WHERE `id` = '".$this->id."'");
	}
	
	
	
	
	
	
	
	
	
	
}










?>