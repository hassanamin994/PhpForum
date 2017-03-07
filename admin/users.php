<?php

session_start();
require_once '../init.php';

$userHandler = new UserHandeller();

if(isset($_POST['delete'])){
	$user = $userHandler->getOneRow('id',$_POST['user_id']);
	// var_dump($user);
	if($user){
		$userHandler->removeByID('id',$_POST['user_id']);
		unset($_POST['user_id']);
		$_SESSION['message'] = "User ".$user['name'] ." Has been deleted Successfully" ;
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

<?php include('../header.php') ; ?>

<?php include('sidebar.php') ; ?>

<div class="col-xs-8">
	<div class="row">
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
				<!-- <tr>
					<td>2</td>
					<td><img src="images/img"></td>
					<td>Username@gmail.com</td>
					<td>Fname</td>
					<td>Lname</td>
					<td>Male</td>
					<td>Egypt</td>
					<td>MY SIGNATURE</td>
					<td>user</td>
					<td>
						<a href="#" class="btn btn-info btn-xs">Edit</a>
						<a href="#" class="btn btn-danger btn-xs">Delete</a>
					</td>
					<td>
						<a href="#" class="btn btn-info btn-xs">Make Admin</a>
						<a class="btn btn-danger btn-xs">Ban</a>
					</td>

				</tr> -->
			</tbody>
		</table>
	</div>
		<details>
		<summary class="btn btn-primary">Add New User</summary><br>
		<form>
			<div class="input-group">
			  <label for="sel1">Select Category:</label>
			  <select class="form-control" id="category" name="category">
			    <option value="2">Category id=2</option>
			    <option value="3">Category id=3</option>
			    <option value="4">Category id=4</option>
			  </select>
			</div>
			<div class="input-group">
			  <label for="new-Forum">Forum Name: </label>
			  <input type="text" name="forum" class="form-control" id="new-Forum" aria-describedby="basic-addon3" required>
			</div>
			<br>
			<div class="input-group">
				<input type="submit" name="submit" class="btn btn-primary" value="Add User">
			</div>
		</form>
	</details>
</div>

<?php include('../javascript.php') ;?>

</body>
</html>
