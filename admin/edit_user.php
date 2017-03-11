<?php

session_start();
require_once '../init.php';

$userHandler = new UserHandeller();
if(isset($_GET['id'])){
	$user = $userHandler->getOneRow('id',$_GET['id']) ;

}else{
	header("Location: index.php");exit;

}
if(isset($_POST['edit_user'])){
	$id = $_POST['user_id'] ;

	$user = $userHandler->getOneRow('id',$id) ;
	$username = $_POST['username'];
	$password = !empty(trim($_POST['password'])) ? md5(trim($_POST['password'])) : $user['password'] ;
	$fname = $_POST['fname'];
	$lname = $_POST['lname'] ;
	$gender = $_POST['gender'];
	$country = $_POST['country'] ;
	$role = $_POST['role'] ;
	$signature = $_POST['signature'] ;
	$user = new User($fname, $lname, $country, $gender, $username, $password, $user['banned'], $user['image'], $signature, $role, $id) ;
	$errors = $user->validate('edit') ;
	if(empty($errors)){
		$user->update() ;
		$_SESSION['message'] = "User has been updated Successfully" ;
	}else{
		$_SESSION['errors'] = $errors ;
	}
	$user = $userHandler->getOneRow('id',$id);
}else{
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="admin.css">
	<style type="text/css">
	.page-content{
		width:100%;
	}
	</style>
</head>
<body>

<?php include('header.php') ; ?>

<?php include('sidebar.php') ; ?>

<div class="col-xs-8">
	<div class="row">
		<?php
		if(isset($_SESSION['message'])){
			echo "<div class='alert alert-success'>";
			echo $_SESSION['message'];
			echo "</div><br>";
			unset($_SESSION['message']);
		}
		 ?>
		 <?php
 				if(isset($errors)  && !empty($_SESSION['errors'])){
 					echo "<div class='alert alert-warning'>";
 					foreach ($errors as $error){
 						echo $error."<br>" ;
 					}
 					unset($_SESSION['errors']);

 					echo "</div>";
 				}

 			?>
 		<form method='post' action="edit_user.php?id=<?php echo $user['id'] ; ?>" >
 			<div class="input-group">
 				<label for="username">Username: </label>
 				<input type="text" name="username" value="<?php echo $user['username'] ; ?>" class="form-control" id="username" aria-describedby="basic-addon3" required>
				<input type="hidden" name="user_id" value="<?php echo $user['id'] ; ?>" >
 			</div>
 			<br>
 			<div class="input-group">
 				<label for="password">Password: </label>
 				<input type="text" name="password" value="" placeholder="Edit Password" class="form-control" id="password" aria-describedby="basic-addon3" >
 			</div>
 			<br>
 			<div class="input-group">
 				<label for="fname">First Name: </label>
 				<input type="text" name="fname" value ="<?php echo $user['fname'] ; ?>" class="form-control" id="fname" aria-describedby="basic-addon3" required>
 			</div>
 			<br>
 			<div class="input-group">
 				<label for="lname">Last Name: </label>
 				<input type="text" name="lname" value ="<?php echo $user['lname'] ; ?>" class="form-control" id="lname" aria-describedby="basic-addon3" required>
 			</div>
 			<br>
			<div class="input-group">
				<label for="signature">Signature: </label>
				<textarea name="signature" rows="8" cols="80" class="form-control"><?php echo $user['signature'] ; ?></textarea>
			</div>
			<br>
 			<div class="input-group">
 			  <label for="gender">Gender:</label>
 			  <select class="form-control" id="gender" name="gender" required>
 			    <option value="male" <?php echo $user['gender']=='male'? 'selected':'' ; ?>>Male</option>
 			    <option value="female" <?php echo $user['gender']=='female'? 'selected':'' ; ?>>Female</option>
 			  </select>
 			</div>
 			<br>
 			<div class="input-group">
 			  <label for="country">Country:</label>
 			  <select class="form-control" id="country" name="country" required>
 			    <option value="egypt" <?php echo $user['country']=='egypt'? 'selected':'' ; ?>>Egypt</option>
 			    <option value="usa" <?php echo $user['country']=='usa'? 'selected':'' ; ?>>USA</option>
 			    <option value="canada" <?php echo $user['country']=='canada'? 'selected':'' ; ?>>Canada</option>
 			  </select>
 			</div>
 			<br>
 			<div class="input-group">
 			  <label for="role">Role:</label>
 			  <select class="form-control" id="role" name="role" required>
 			    <option value="user" <?php echo $user['role']=='user'? 'user':'' ; ?> >User</option>
 			    <option value="admin" <?php echo $user['role']=='admin'? 'selected':'' ; ?>>Admin</option>
 			  </select>
 			</div>
 			<br>
 			<div class="input-group">
 				<input type="submit" name="edit_user" class="btn btn-primary" value="Update User">
 			</div>
 		</form>
	</div>
</div>

<?php include('../javascript.php') ;?>

</body>
</html>
