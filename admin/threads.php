<?php
session_start();
require_once '../init.php';

$threadHandeller = new ThreadHandeller();


// handle add new thread

if(isset($_POST['add_thread'])){
	$title = $_POST['thread_title'] ;
	$description = $_POST['thread_description'];
	$forum_id = $_POST['thread_forum'] ;
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	// get the user's id later from the session >>>>>>>>>>>>>>>>>>> IMPORTANT <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	$thread = new Thread(null, $title, $description, $forum_id, $_SESSION['id']) ;
	$errors = $thread->verify();
	if(empty($errors)){
		$thread->addThread();
		$_SESSION['message'] = "Thread has been added Successfully" ;
	}else{
		$_SESSION['errors'] = $errors ;
	}
}

// handle lock/unlock
if(isset($_POST['lock'])){
	$thread = $threadHandeller->getOneRow('id',$_POST['lock_id']);
	$thread = new Thread(
		$thread['id'],
		$thread['title'],
		$thread['description'],
		$thread['forum_id'],
		$thread['user_id'],
		$thread['locked'],
		$thread['sticky']
	);
	$thread->toggleLock();
}

// handle stick/unstick
if(isset($_POST['stick'])){
	$thread = $threadHandeller->getOneRow('id',$_POST['stick_id']);
	$thread = new Thread(
		$thread['id'],
		$thread['title'],
		$thread['description'],
		$thread['forum_id'],
		$thread['user_id'],
		$thread['locked'],
		$thread['sticky']
	);
	$thread->toggleStick();
}
// handle delete
if(isset($_POST['delete'])){
	$thread = $threadHandeller->getOneRow('id',$_POST['delete_id']);
	$thread = new Thread(
		$thread['id'],
		$thread['title'],
		$thread['description'],
		$thread['forum_id'],
		$thread['user_id'],
		$thread['locked'],
		$thread['sticky']
	);
	$thread->deleteThread();
	unset($_POST['delete']);
	$_SESSION['message'] = "Thread ".$thread->title ." Has been deleted Successfully" ;
}

$threads = $db->getAll('thread');
$users = $db->getAll('user');
$forums = $db->getAll('forum') ;
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
	<style type="text/css">

	</style>
</head>
<body>

<?php include('header.php') ; ?>
<?php include('sidebar.php') ; ?>

<div class="page-content">
	<div class="col-xs-8">
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
						<th>Title</th>
						<th>User</th>
						<th>Forum</th>
						<th>Created At</th>
						<th>Last Updated</th>
						<th>Action</th>
						<th>Special Actions</th>
						<th>Comments</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($threads as $thread) {
						$status = $thread['locked'] == 0 ? 'lock' : 'unlock' ;
						$update_time =!empty($thread['last_update']) ? $thread['last_update'] :"Null" ;
						$sticky = $thread['sticky'] == 0 ? 'stick' : 'unstick' ;
						// getting the username of user who  created the forum
						foreach ($users as $user) {
							if($user['id']== $thread['user_id']){
								$threadUser = $user['username'] ;
								break ;
							}
						}
						//getting the forum name of the thread
						foreach ($forums as $forum ) {
								if($forum['id'] == $thread['forum_id']){
									$forumName = $forum['name'];
								}
						}
						echo "<td>".$thread['id']."</td>";
						echo "<td>".$thread['title']."</td>";
						echo "<td>".$threadUser."</td>" ;
						echo "<td>".$forumName."</td>" ;
						echo "<td>".$thread['created_at']."</td>";
						echo "<td>".$update_time ."</td>" ;
						echo "<td>";
						echo "<a href='edit_thread.php?edit_id=".$thread['id']."' class='btn btn-info btn-xs'>Edit</a>" ;
						echo "<form method='post' action='threads.php'>
								<input type='hidden' name='delete_id' value=".$thread['id']." >
								<input type='submit' name='delete' value='Delete' class='btn btn-danger btn-xs' >
								</form>";
						echo "</td>";
						echo "<td>" ;
						echo "<form method='post' action='threads.php'>
								<input type='hidden' name='lock_id' value=".$thread['id']." >
								<input type='submit' value='".$status."' name='lock' class='btn btn-warning btn-xs' >
								</form>";
						echo "<form method='post' action='threads.php'>
								<input type='hidden' name='stick_id' value=".$thread['id']." >
								<input type='submit' value='".$sticky."' name='stick' class='btn btn-info btn-xs' >
								</form>";
						echo "</td>";
						echo "<td>";
						echo "<a href='comments.php?thread_id=".$thread['id']."' class='btn btn-success btn-xs'>View Comments</a>";
						echo "</td>" ;
						echo "</tr>";
					}
					 ?>
				</tbody>
			</table>
		</div>
		<div class="row">
			<details  <?php if(!empty($_SESSION['errors'])) { echo "open";  } ?> >
				<summary class="btn btn-primary">Add New Thread</summary><br>
				<?php
 					 if(isset($errors)){
 						 echo "<div class='alert alert-warning'>";
 						 foreach ($errors as $error){
 							 echo $error."<br>" ;
 						 }
 						 unset($_SESSION['errors']);

 						 echo "</div>";
 					 }
 					 if(isset($_SESSION['message'])){
 						 echo "<div class='alert alert-warning'>";
 						 echo $_SESSION['message'];
 						 echo "</div><br>";
 						 unset($_SESSION['message']);
 					 }
 				 ?>
				<form method='post' >
					<div class="input-group">
					  <label for="forum">Select Category > Forum :</label>
					  <select class="form-control" id="forum" name="thread_forum">
							<?php
							foreach ($categories as $category) {
								$categoryForums = $categoryHandeller->getTree($category['id']);
								foreach ($categoryForums as $forum) {
									echo "<option value='".$forum['forum_id']."'>".$category['name']." > ".$forum['forum_name']."</option>";
								}
							}
							?>
					  </select>
					</div><br>
					<div class="input-group">
					  <label for="thread_title">Thread Title : </label>
					  <input type="text" name="thread_title" class="form-control" id="thread_title" aria-describedby="basic-addon3" value="<?php echo isset($_POST['thread_title']) ? $_POST['thread_title'] : "" ; ?>" required >
					</div>
					<br>
					<div class="input-group">
					  <label for="thread_description">Thread body : </label>
						<textarea name="thread_description" rows=10 cols=40 class="form-control" id="thread_description" aria-describedby="basic-addon3" required><?php echo isset($_POST['thread_description']) ? $_POST['thread_description'] : "" ;?></textarea>
					</div>
					<br>

					<div class="input-group">
						<input type="submit" name="add_thread" class="btn btn-primary" value="Add Thread">
					</div>
				</form>
			</details>
		</div>
	</div>

</div>



<?php include('../javascript.php') ;?>

</body>
</html>
