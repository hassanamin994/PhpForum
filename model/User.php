<?php
require_once __DIR__.'/DBManager.php';

class User{
	private $id;
	private $fname;
	private $lname;
	private $gender;
	private $country;
	private $username;
	private $password;
	private $banned;
	private $picture;
	private $signature;
	private $role;
	
	private $db ;
	private $created_at ;
	function __construct($fname,$lname,$country,$gender,$username,$password,$banned,$picture,$signature,$role){
		
		$this->db = new DBManager() ;
		// 		$this->id = $id ;
		$this->fname = $fname ;
		$this->lname = $lname ;
		
		
	
		$this->country = $country;
			$this->gender = $gender;
		$this->username = $username;
		$this->password = $password ;
		$this->$banned=$banned;
		$this->$picture=$picture;
		$this->$signature=$signature;
		$this->role = $role;
	
		
	}
	
	function __set($field,$value){
		$this->$field = $value ;
	}
	
	function __get($field){
		return $this->$field ;
	}
	
	function validate($status){
		$errors = array() ;
		if(empty($this->fname)){
			array_push($errors,'Please enter First name');
		}
		
		if(empty($this->lname))
							array_push($errors,'Please enter Last name');
		
		if(empty($this->address))
							array_push($errors,'Please your Address');
		
		if(empty($this->country))
						    array_push($errors,'Please select your Countery');
		
		if(empty($this->gender))
							array_push($errors,'Please select your Gender');
		
		
		if(empty($this->skills))
				 			array_push($errors,'Please select at least one Skill');
		
		
		if(empty($this->username))
						 	array_push($errors,'Please Enter a Username');
		else{
			// 			check if username already taken 
								    if($status == 'submit'){
				$result = $this->db->getUser($this->username);
				if(!empty($result)){
					array_push($errors,'The username is already taken!');
				}
			}
		}
		if(empty($this->password))
							array_push($errors,'Please Enter a Password');
		
		if(!empty($_POST['token_entered'])){
			if($_POST['token_entered'] != $_POST['token'])
								    	array_push($errors,'Validation token doesnt match!');
			else
								    	$token = $_POST['token'];
		}
		else
						  array_push($errors,'Please enter the validation token!');
		
		if(empty($this->department))
						  array_push($errors,'Please enter the department!');
		
		return $errors;
	}
	
	function toArray(){
		$array = [
						"id" => $this->id ,
						"fname" => $this->fname,
						"lname" => $this->lname,
						"address" => $this->address,
						"gender" =>$this->gender,
						"country" => $this->country,
						"skills" => $this->skills,
						"username" => $this->username,
						"password" => $this->password,
						"department" => $this->department,
						"role" => $this->role,
						"created_at" => $this->created_at
						];
		return $array;
	}
	function signUp(){
	
		$this->id = $this->db->getLastInsertedId() ;
		
// $result=  $this->db->makeQuery("insert into user (`id`,`username`,`password`,`fname`,`lname`,`gender`,`country`,`image`,`signature`)Values     jkf   ('".$this->id."''".$this->username."''".$this->password."''".$this->fname."''".$this->lname."''".$this->gender."''".$this->countrey."''".$this->picture."''".$this->signature."')");
echo "test".$this->countrey."con".$this->picture,$this->signature;
$result=$this->db->makeQuery("INSERT INTO `user` (`username`,`password`,`fname`,`lname`,`gender`,`country`,`image`,`signature`) VALUES ('$this->username','$this->password','$this->fname','$this->lname','$this->gender','$this->country','$this->picture','$this->signature')");

		return $result ;
	}
	function update(){
		$statement = $this->db->makeQuery(
				        "update user set 
        `fname` = '".$this->fname."' ,
        `lname` = '".$this->lname."' , 
        `address` = '".$this->address."', 
        `country` = '".$this->country."' , 
        `gender` = '".$this->gender."',
        `skills` = '".implode(',',$this->skills)."',
        `username` = '".$this->username."',
        `password` = '".$this->password."',
        `department` = '".$this->department."'
         where `id` = '".$_POST['user_id']."'
         ");
		return $statement;
		
	}
	function deleteUser(){
		$statement = $this->db->makeQuery("DELETE FROM user WHERE `id` = '".$this->id."'");
		return $statement ;
	}
	
	
	
}

$user

?>