<?php

define('HOST','localhost');
define('DB_NAME','jaguars');
define('DB_USERNAME','root');

define('DB_PASSWORD','sa');

class DBManager{

	private $dsn ;
	public 	$db ;
	private $statement ;
	function __construct(){
		$this->dsn = 'mysql:host='.HOST.';dbname='.DB_NAME;
		$this->db = new PDO($this->dsn,DB_USERNAME,DB_PASSWORD);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}

	function getAll($table){
		$statement = $this->db->prepare("SELECT * FROM ".$table." ORDER BY created_at desc") ;
		$result = $statement->execute();
		if($result){
			$output = array() ;
			while($element = $statement->fetch(PDO::FETCH_ASSOC)){
				$output[] = $element;
			}
			return $output;
		}else{
			return false ;
		}
	}

	function makeQuery($query){
		$statement = $this->db->prepare($query) ;
		$result = $statement->execute();
		if($statement->rowCount()){
			$output = array() ;
			try{
				while($element = $statement->fetch(PDO::FETCH_ASSOC)){
				$output[] = $element;
				}
			}
			catch(Exception $e){
				// in case of INSERT/DELETE/UPDATE which cannot be fetched


			}
			return $output;
		}else{
			return false ;
		}
	}
	function getLastInsertedId(){
		return $this->db->lastInsertId();
	}
	function getUser($username){
		return $this->makeQuery("Select * from user where `username` ='".$username."'") ;
	}
	function getUserById($id){
		//return ($this->makeQuery("Select * from user where `id` ='".$id."'"))[0] ;
	}
	function getUserPosts($id){
		return $this->makeQuery("Select * from post where `user_id` =".$id." ORDER BY created_at DESC");
	}
	function getPostById($id){
		return $this->makeQuery("Select * from post where `id` = '".$id."'")[0];
	}
	function deletePost($id){
		return $this->makeQuery("DELETE from post WHERE `id` = '".$id."'");
	}
	function deleteUser($id){
		return $this->makeQuery("DELETE from user WHERE `id` = '".$id."'");
	}
	function getRole($username){
		return $this->makeQuery("Select * from user where `username` ='".$username."' and `role`='admin'" ) ;
	}


function checkUser($username,$password){
		return $this->makeQuery("Select * from user where `username` ='".$username."' and `password`='".md5($password)."'") ;
	}

}

// $db = new DBManager() ;


?>
