<?php



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

<div class="col-xs-10">
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
				<tr>
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

				</tr>
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