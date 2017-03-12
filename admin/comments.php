<?php
session_start();
require_once '../init.php';

$commentHandeller = new CommentHandeller();

if(isset($_GET['thread_id'])){

}elseif(isset($_POST['delete'])){
	$comment = $commentHandeller->getOneRow('id',$_POST['delete_id']);
	$comment = new Comment(
		$comment['id'],
		$comment['body'],
		$comment['user_id'],
		$comment['thread_id']
	);
	$comment->deleteComment();
	$comment = $commentHandeller->getOneRow('id',$_POST['delete_id']);
	unset($_POST['delete']);
	$_SESSION['message'] = "Comment Has been deleted Successfully" ;
	header("location: threads.php") ;exit;
}else{
	header('Location: index.php') ;exit;
}


// handle delete


$comments = $commentHandeller->selectAllBy('thread_id',$_GET['thread_id']) ;
// var_dump($comments);


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
						<th>User</th>
						<th>Comment</th>
						<th>Created At</th>
						<th>Last Updated</th>
						<th>Edit By</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($comments as $comment) {
							# code...

							$update_time = $comment['last_update'] ? $comment['last_update'] : "Null";
							$edit_by = $comment['edit_by'] ? $comment['edit_by'] : "Null" ;
							echo "<td>".$comment['id']."</td>";
							echo "<td>".$comment['user_id']."</td>";
							echo "<td>".$comment['body']."</td>" ;
							echo "<td>".$comment['created_at']."</td>";
							echo "<td>".$update_time ."</td>" ;
							echo "<td>".$edit_by."</td>";
							echo "<td>";
							echo "<a href='edit_comment.php?edit_id=".$comment['id']."' class='btn btn-info btn-xs'>Edit</a>" ;
							echo "<form method='post' action='comments.php'>
									<input type='hidden' name='delete_id' value=".$comment['id']." >
									<input type='submit' name='delete' value='Delete' class='btn btn-danger btn-xs' >
									</form>";
							echo "</td>";
							echo "</tr>";
						}
					 ?>

				</tbody>
			</table>
		</div>
	</div>
</div>



<?php include('../javascript.php') ;?>

</body>
</html>
