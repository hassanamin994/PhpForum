<?php
session_start();
require_once '../init.php';
$categoryHandler = new CategoryHandeller();

if(isset($_GET['edit_id'])){
		$category =  $categoryHandler->getOneRow('id',$_GET['edit_id']);
}

//handling update request
if(isset($_POST['category_id'])){
	$category =  $categoryHandler->getOneRow('id',$_POST['category_id']);
	$categoryObj = new Category($_POST['category_id'], $_POST['category_name']);
	$errors = $categoryObj->verify('edit') ;
	if(empty($errors)){
			$categoryObj->editcategory() ;
			$_SESSION['message'] = "Category Updated Successfully" ;
			header('Location: edit_category.php?edit_id='.$_POST['category_id']) ;
			unset($_POST);exit ;
	}else{
		$_SESSION['errors'] = $errors ;
	}
	var_dump($errors);
	var_dump($categoryObj);
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
			<?php
         if(isset($errors) && !empty($_SESSION['errors'])){
           echo "<div class='alert alert-warning'>";
           foreach ($errors as $error){
             echo $error."<br>" ;
           }
           unset($_SESSION['errors']);

           echo "</div>";
         }
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
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(isset($category)){
							echo "<tr>";
							echo "<td>".$category['id']."</td>";
							echo "<td>";
							echo "<form method='post' action='edit_category.php'>
											<input type='hidden' name='category_id' value=".$category['id']." >
											<input type='text' value='".$category['name']."' name='category_name' >
											<input type='submit' value='Submit' class='btn btn-success' >
										</form>";
							echo "</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>




<?php include('../javascript.php') ;?>

</body>
</html>
