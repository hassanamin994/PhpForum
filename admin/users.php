<?php

session_start();
require_once '../init.php';

$userHandler = new UserHandeller();

if(isset($_POST['add_user'])){
	$username = $_POST['username'];
	$password = $_POST['password'] ;
	$fname = $_POST['fname'];
	$lname = $_POST['lname'] ;
	$gender = $_POST['gender'];
	$country = $_POST['country'] ;
	$role = $_POST['role'] ;

	$user = new User($fname, $lname, $country, $gender, $username, $password, 0, "", "", $role) ;
	$errors = $user->validate() ;
	if(empty($errors)){
		$user->signUp() ;
		$_SESSION['message'] = "User has been added Successfully" ;
	}else{
		$_SESSION['errors'] = $errors ;
	}

}

if(isset($_POST['delete'])){
	$user = $userHandler->getOneRow('id',$_POST['user_id']);
	// var_dump($user);
	if($user){
		$userHandler->removeByID('id',$_POST['user_id']);
		unset($_POST['user_id']);
		$_SESSION['message'] = "User ".$user['username'] ." Has been deleted Successfully" ;
	}
}
if(isset($_POST['change_role'])){
	$user = $userHandler->getOneRow('id',$_POST['user_id']);
	$user = new User(
		$user['fname'],
		$user['lname'],
		$user['country'],
		$user['gender'],
		$user['username'],
		$user['password'],
		$user['banned'],
		$user['image'],
		$user['signature'],
		$user['role'],
		$user['id']
	);
	$user->toggleRole();
}
if(isset($_POST['ban'])){
	$user = $userHandler->getOneRow('id',$_POST['user_id']);
	$user = new User(
		$user['fname'],
		$user['lname'],
		$user['country'],
		$user['gender'],
		$user['username'],
		$user['password'],
		$user['banned'],
		$user['image'],
		$user['signature'],
		$user['role'],
		$user['id']
	);
	$user->toggleBan();
}

$users = $db->getAll('user');
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
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Image</th>
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Gender</th>
					<th>Country</th>
					<th>Signature</th>
					<th>Role</th>
					<th>Actions</th>
					<th>Special Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($users as $user){
					$ban = $user['banned'] == 0 ? "Ban" : "Unban" ;
					$role = $user['role'] == "admin" ? "Make User" : "Make Admin" ;
					echo "<tr>";
					echo "<td>".$user['id']."</td>";
					echo "<td><img src='".$user['image']."' ></td>";
					echo "<td>".$user['fname']."</td>";
					echo "<td>".$user['username']."</td>";
					echo "<td>".$user['lname']."</td>";
					echo "<td>".$user['gender']."</td>";
					echo "<td>".$user['country']."</td>";
					echo "<td>".$user['signature']."</td>";
					echo "<td>".$user['role']."</td>";
					echo "<td><a href='edit_user.php?id=".$user['id']."' class='btn btn-info btn-xs' >Edit</a> ";
					echo
					"<form method='post' action='users.php'>
							<input type='hidden' name='user_id' value=".$user['id']." >
							<input type='submit' name='delete' value='Delete' class='btn btn-danger btn-xs' >
							</form>
					".
					"</td>";
					echo "<td>".
					"<form method='post' action='users.php'>
							<input type='hidden' name='user_id' value=".$user['id']." >
							<input type='submit' name='change_role' value='".$role."' class='btn btn-info btn-xs' >
							</form>
					".
					"<form method='post' action='users.php'>
							<input type='hidden' name='user_id' value=".$user['id']." >
							<input type='submit' name='ban' value='".$ban."' class='btn btn-warning btn-xs' >
							</form>
					"."</td>";


					echo "</tr>";
				}


				?>
			</tbody>
		</table>
	</div>
		<details <?php if(!empty($_SESSION['errors'])) { echo "open"; } ?>>
		<summary class="btn btn-primary">Add New User</summary><br>
		<?php
				if(isset($errors)){
					echo "<div class='alert alert-warning'>";
					foreach ($errors as $error){
						echo $error."<br>" ;
					}
					unset($_SESSION['errors']);

					echo "</div>";
				}

			?>
		<form method='post'>
			<div class="input-group">
				<label for="username">Username: </label>
				<input type="text" name="username" class="form-control" id="username" aria-describedby="basic-addon3" required>
			</div>
			<br>
			<div class="input-group">
				<label for="password">Password: </label>
				<input type="password" name="password" class="form-control" id="password" aria-describedby="basic-addon3" required>
			</div>
			<br>
			<div class="input-group">
				<label for="fname">First Name: </label>
				<input type="text" name="fname" class="form-control" id="fname" aria-describedby="basic-addon3" required>
			</div>
			<br>
			<div class="input-group">
				<label for="lname">Last Name: </label>
				<input type="text" name="lname" class="form-control" id="lname" aria-describedby="basic-addon3" required>
			</div>
			<br>
			<div class="input-group">
			  <label for="gender">Gender:</label>
			  <select class="form-control" id="gender" name="gender" required>
			    <option value="male">Male</option>
			    <option value="female">Female</option>
			  </select>
			</div>
			<br>
			<div class="input-group">
			  <label for="country">Country:</label>
			  <select class="form-control" id="country" name="country" required>
			    <option value="egypt">Egypt</option>
			    <option value="usa">USA</option>
			    <option value="canada">Canada</option>
			  </select>
			</div>
			<br>
			<div class="input-group">
			  <label for="role">Role:</label>
			  <select class="form-control" id="role" name="role" required>
			    <option value="user">User</option>
			    <option value="admin">Admin</option>
			  </select>
			</div>
			<br>
			<div class="input-group">
				<input type="submit" name="add_user" class="btn btn-primary" value="Add User">
			</div>
		</form>
	</details>
</div>

<?php include('../javascript.php') ;?>

</body>
</html>
