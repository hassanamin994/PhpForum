<?php

require_once '../init.php';


// handling delete requests
$categoryHandler = new CategoryHandeller();
if(isset($_POST['delete_id'])){
	$category =  $categoryHandler->getOneRow('id',$_POST['delete_id']);
	if($category){
		$categoryHandler->removeByID('id',$_POST['delete_id']);
		unset($_POST['delete_id']);
		$_SESSION['message'] = "Category ".$category['name'] ." Has been deleted Successfully" ;
	}
}


// handling new category requests
if(isset($_POST['submit'])){
	$category = new Category(null,$_POST['category']) ;
	$errors = $category->verify() ;
	if(empty($errors)){
			$category->addcategory() ;
			unset($_POST);
			$_SESSION['message'] = "Category created Successfully" ;
	}else{
		$_SESSION['errors'] = $errors ;
	}
}


$categories = $db->getAll("category");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body class='back'>

<?php include('../header.php') ; ?>
<?php include('sidebar.php') ; ?>


	<div class="col-xs-8 cont" style="padding:25px;">

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
					<?php
						foreach ($categories as $category ) {
							echo "<tr>";
							echo "<td>".$category['id']."</td>";
							echo "<td>".$category['name']."</td>";
							echo "<td>";
							echo "<form method='post' action='categories.php'>
									<input type='hidden' name='delete_id' value=".$category['id']." >
									<input type='submit' value='Delete' class='btn btn-danger' >
								  </form>";
							echo "<a href='edit_category?edit_id=".$category['id']."' class='btn btn-info'>Edit</a></td>" ;
							echo "</tr>";
						}

					?>
				</tbody>
			</table>
		</div>
		<div class="row">
			<details <?php if(!empty($_SESSION['errors'])) { echo "open"; unset($_SESSION['errors']); } ?> >
				<summary class="btn btn-primary" >Add New Category</summary>
				<form method="post" action='categories.php'>
					<div class="input-group">

					  <label for="new-category">Category Name: </label><br>
						<?php
								if(isset($errors)){
									echo "<div class='alert alert-warning'>";
									foreach ($errors as $error){
										echo $error ;
									}
									unset($_SESSION['errors']);
									echo "</div>";
								}
								if(isset($_SESSION['message'])){
									echo $_SESSION['message'];
									unset($_SESSION['message']);
								}
							?>
					  <input type="text" class="form-control" id="new-category" aria-describedby="basic-addon3" name="category" required
						<?php if(isset($_POST['category'])) { echo "value='".$_POST['category']."'" ;}?>
						>
					</div>
					<br>
					<div class="input-group">
						<input type="submit" name="submit" class="btn btn-primary" value="Add Category">

					</div>
				</form>
			</details><br>
		</div>
	</div>




<?php include('../javascript.php') ;?>

</body>
</html>
