<?php
session_start();
require_once '../init.php';
$categoryHandler = new CategoryHandeller();

if(isset($_GET['edit_id'])){
$threadID = $_GET['edit_id'] ;
$threadHandler = new ThreadHandeller($threadID);
$thread = $threadHandler->getOneRow('id',$threadID);

}

// handle add new thread

if(isset($_POST['add_thread'])){
	$threadID = $_GET['edit_id'];
	$title = $_POST['thread_title'] ;
	$description = $_POST['thread_description'];
	$forum_id = $_POST['thread_forum'] ;
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	// get the user's id later from the session >>>>>>>>>>>>>>>>>>> IMPORTANT <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	$threadEdit = new Thread($threadID, $title, $description, $forum_id, '2') ;
	$errors = $threadEdit->verify();
	if(empty($errors)){
		$threadEdit->editThread();
		$_SESSION['message'] = "Thread has been Updated Successfully" ;
	}else{
		$_SESSION['errors'] = $errors ;
	}
}

$categoryHandeller = new CategoryHandeller() ;
$categories = $db->getAll('category') ;
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
			<form method='post' >
				<div class="input-group">
					<label for="forum">Select Category > Forum :</label>
					<select class="form-control" id="forum" name="thread_forum">
						<?php
						foreach ($categories as $category) {
							$categoryForums = $categoryHandeller->getTree($category['id']);
							foreach ($categoryForums as $forum) {
								echo "<option value='".$forum['forum_id']."'";
									if($forum['forum_id'] == $thread['forum_id'])
										echo "selected";
								echo " >".$category['name']." > ".$forum['forum_name']."</option>";
							}
						}
						?>
					</select>
				</div><br>
				<div class="input-group">
					<label for="thread_title">Thread Title : </label>
					<input type="text" name="thread_title" class="form-control" id="thread_title" aria-describedby="basic-addon3" value="<?php echo isset($thread) ? $thread['title'] : "" ; ?>" required >
				</div>
				<br>
				<div class="input-group">
					<label for="thread_description">Thread body : </label>
					<textarea name="thread_description" rows=10 cols=40 class="form-control" id="thread_description" aria-describedby="basic-addon3" required><?php echo isset($thread) ? $thread['description'] : "" ;?></textarea>
				</div>
				<br>

				<div class="input-group">
					<input type="submit" name="add_thread" class="btn btn-primary" value="Add Thread">
				</div>
			</form>
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
		</div>
	</div>




<?php include('../javascript.php') ;?>

</body>
</html>
