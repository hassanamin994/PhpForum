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
						<th>Title</th>
						<th>Forum</th>
						<th>Category</th>
						<th>Created At</th>
						<th>Last Updated</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>2</td>
						<td>Thread Heading</td>
						<td>Forum1</td>
						<td>Category1</td>
						<td>11/1/2017</td>
						<td>12/1/2017</td>
						<td>
							<a href="#" class="btn btn-info">Edit</a> 
							<a class="btn btn-warning">Lock</a>
							<a href="#" class="btn btn-danger">Delete</a> 
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Thread Heading</td>
						<td>Forum1</td>
						<td>Category1</td>
						<td>11/1/2017</td>
						<td>12/1/2017</td>
						<td>
							<a href="#" class="btn btn-info">Edit</a> 
							<a class="btn btn-warning">Lock</a>
							<a href="#" class="btn btn-danger">Delete</a> 
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Thread Heading</td>
						<td>Forum1</td>
						<td>Category1</td>
						<td>11/1/2017</td>
						<td>12/1/2017</td>
						<td>
							<a href="#" class="btn btn-info">Edit</a> 
							<a class="btn btn-warning">Lock</a>
							<a href="#" class="btn btn-danger">Delete</a> 
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Thread Heading</td>
						<td>Forum1</td>
						<td>Category1</td>
						<td>11/1/2017</td>
						<td>12/1/2017</td>
						<td>
							<a href="#" class="btn btn-info">Edit</a> 
							<a class="btn btn-warning">Lock</a>
							<a href="#" class="btn btn-danger">Delete</a> 
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>
		<div class="row">
			<a class="btn btn-primary">Add New Thread</a>
		</div>
	</div>

</div>



<?php include('../javascript.php') ;?>

</body>
</html>