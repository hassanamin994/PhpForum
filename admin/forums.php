<?php
require_once '../init.php';

// handling delete requests
$forumHandler = new ForumHandeller();
if(isset($_POST['delete_id'])){
	$forum =  $forumHandler->getOneRow('id',$_POST['delete_id']);
	if($forum){
		$forumHandler->removeByID('id',$_POST['delete_id']);
		unset($_POST['delete_id']);
		$_SESSION['message'] = "Forum ".$forum['name'] ." Has been deleted Successfully" ;
	}
}

// handling new forum requests
if(isset($_POST['submit'])){
	$forum = new Forum(null,$_POST['forum'],$_POST['category']) ;
	$errors = $forum->verify() ;
	if(empty($errors)){
			$forum->addforum() ;
			$_POST = array();
			unset($_POST['submit']);
			$_SESSION['message'] = "Forum created Successfully" ;
	}else{
		$_SESSION['errors'] = $errors ;
	}
}

// handle lock/unlock
if(isset($_POST['lock'])){
	$forum = $forumHandler->getOneRow('id',$_POST['lock_id']);
	$forum = new Forum($forum['id'], $forum['name'], $forum['category_id'], $forum['locked']);
	$forum->toggleLock();
}





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

<?php include('header.php') ; ?>
<?php include('sidebar.php') ; ?>

<div class="col-xs-8 cont" >
	<?php
		 if(isset($errors) && !empty($_SESSION['errors'])){
			 echo "<div class='alert alert-warning'>";
			 foreach ($errors as $error){
				 echo $error."<br>" ;
			 }
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
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($forums as $forum ) {
					$status = $forum['locked'] == 0 ? 'lock' : 'unlock' ;
					echo "<tr>";
					echo "<td>".$forum['id']."</td>";
					echo "<td>".$forum['name']."</td>";
					echo "<td>";
					echo "<a href='edit_forum.php?edit_id=".$forum['id']."' class='btn btn-info'>Edit</a>" ;
					echo "<form method='post' action='forums.php'>
							<input type='hidden' name='lock_id' value=".$forum['id']." >
							<input type='submit' value='".$status."' name='lock' class='btn btn-warning' >
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
	<details  <?php if(!empty($_SESSION['errors'])) { echo "open"; unset($_SESSION['errors']); } ?> >
		<summary class="btn btn-primary">Add New Forum</summary><br>
		<form method='post' >
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
