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

	</style>
</head>
<body>

<?php include('../header.php') ; ?>
<?php include('sidebar.php') ; ?> 

<div class="col-xs-8">
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>2</td>
				<td>Forum</td>
				<td>
					<a href="#" class="btn btn-info">Edit</a> 
					<a class="btn btn-warning">Lock</a>
					<a href="#" class="btn btn-danger">Delete</a> 
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Forum</td>
				<td>
					<a href="#" class="btn btn-info">Edit</a> 
					<a class="btn btn-warning">Lock</a>
					<a href="#" class="btn btn-danger">Delete</a> 
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Forum</td>
				<td>
					<a href="#" class="btn btn-info">Edit</a> 
					<a class="btn btn-warning">Lock</a>
					<a href="#" class="btn btn-danger">Delete</a> 
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Forum</td>
				<td>
					<a href="#" class="btn btn-info">Edit</a> 
					<a class="btn btn-warning">Lock</a>
					<a href="#" class="btn btn-danger">Delete</a> 
				</td>
			</tr>
		</tbody>
	</table>
	<details>
		<summary class="btn btn-primary">Add New Forum</summary><br>
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
				<input type="submit" name="submit" class="btn btn-primary" value="Add Forum">
			</div>
		</form>
	</details>
</div>




<?php include('../javascript.php') ;?>

</body>
</html>