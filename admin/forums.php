<?php
session_start();
require_once '../init.php';


$categories = $db->getAll("category");
$forums = $db->getAll("forum");
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
<body class="back">

<?php include('../header.php') ; ?>
<?php include('sidebar.php') ; ?>

<div class="col-xs-8 cont" >
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($forums as $forum ) {
					echo "<tr>";
					echo "<td>".$forum['id']."</td>";
					echo "<td>".$forum['name']."</td>";
					echo "<td>";
					echo "<a href='edit_category?edit_id=".$forum['id']."' class='btn btn-info'>Edit</a>" ;
					echo "<form method='post' action='forums.php'>
							<input type='hidden' name='lock_id' value=".$forum['id']." >
							<input type='submit' value='Lock' name='lock' class='btn btn-warning' >
							</form>";
					echo "<form method='post' action='forums.php'>
							<input type='hidden' name='delete_id' value=".$forum['id']." >
							<input type='submit' name='delete' value='Delete' class='btn btn-danger' >
							</form>";

					echo "</td>";
					echo "</tr>";
				}

			?>
		</tbody>
	</table>
	<details>
		<summary class="btn btn-primary">Add New Forum</summary><br>
		<form>
			<div class="input-group">
			  <label for="sel1">Select Category:</label>
			  <select class="form-control" id="category" name="category">
					<?php
					foreach ($categories as $category) {
						echo "<option value='".$category['id']."'>".$category['name']."</option>";
					}
					?>
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
