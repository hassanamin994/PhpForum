<?php
require_once '../init.php';
$commentHandeller = new CommentHandeller();

if(isset($_GET['edit_id'])){
$commentID = $_GET['edit_id'] ;
$comment = $commentHandeller->getOneRow('id',$commentID);
}elseif(isset($_POST['update_comment'])){
  $commentID = $_POST['edit_id'];
  $comment_body = $_POST['comment_body'];
  $comment = $commentHandeller->getOneRow('id',$commentID);
  $comment = new Comment($comment['id'], $comment_body, $comment['user_id'], $comment['thread_id']);
  $errors = $comment->verify() ;
  if(empty($errors)){
    $editby = 'Admin | '.$_SESSION['username'];
    $comment->editComment($comment_body,$editby, $commentID) ;
    $_SESSION['message'] = "Comment has been updated Successfully!";
  }else{
    $_SESSION['errors'] = $errors ;
  }
  $comment = $commentHandeller->getOneRow('id',$commentID);
}else{
  header("Location: index.php") ;
}

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

<?php include('header.php') ; ?>
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
			<form method='post' action='edit_comment.php'>

				<div class="input-group">
          <input type="hidden" name="edit_id" value="<?php echo $comment['id'] ; ?>">
					<label for="thread_description">Comment body : </label>
					<textarea name="comment_body" rows=10 cols=40 class="form-control" id="thread_description" aria-describedby="basic-addon3" required><?php echo isset($comment) ? $comment['body'] : "" ;?></textarea>
				</div>
				<br>

				<div class="input-group">
					<input type="submit" name="update_comment" class="btn btn-primary" value="Update Comment">
				</div>
			</form>
		</div>
	</div>




<?php include('../javascript.php') ;?>

</body>
</html>
