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

<div class="page-content">
	<div class="col-xs-8">
		<div class="row">
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
						<td>Category1</td>
						<td><a href="#" class="btn btn-danger">Delete</a> <a href="#" class="btn btn-info">Edit</a></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Category1</td>
						<td><a href="#" class="btn btn-danger">Delete</a> <a href="#" class="btn btn-info">Edit</a></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Category1</td>
						<td><a href="#" class="btn btn-danger">Delete</a> <a href="#" class="btn btn-info">Edit</a></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Category1</td>
						<td><a href="#" class="btn btn-danger">Delete</a> <a href="#" class="btn btn-info">Edit</a></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Category1</td>
						<td><a href="#" class="btn btn-danger">Delete</a> <a href="#" class="btn btn-info">Edit</a></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="row">
			<details>
				<summary class="btn btn-primary">Add New Category</summary>
				<form>
					<div class="input-group">
					  <label for="new-category">Category Name: </label>
					  <input type="text" class="form-control" id="new-category" aria-describedby="basic-addon3" name="category" required>
					</div>				
					<br>
					<div class="input-group">
						<input type="submit" name="submit" class="btn btn-primary" value="Add Category">
					</div>
				</form>
			</details>
		</div>
	</div>

</div>



<?php include('../javascript.php') ;?>

</body>
</html>