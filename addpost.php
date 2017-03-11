<?php
include('header.php') ;
include 'main.php';
if(empty($_REQUEST)){header("location: pagenotfound.php");}
$forum_id = $_REQUEST['forumid'];

$user_id=$_SESSION['id'];
//echo $user_id;

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body class="back">
<form method="post">
<div class="container cont">
<div class="form-group">
  Title <input type="text" class="form-control" name="title">
  <br>
  <textarea class="form-control" name="content"></textarea>
  <br>
  <button name="add" type="submit">Add Post</button>
 
<?php
if(isset($_POST['add'])){

	if(empty($_POST['title']) || empty($_POST['content']))
	{
		echo '<p>These fields are required</p>';
	}
	else{


	 // $record=["title"=>$_POST['title'],"description"=>$_POST['content'],"forum_id"=>$_SESSION['forumid'],"user_id"=>$_SESSION['userid']];
	 // $newth = new ThreadHandeller();
	// $newth->insert($record);

	$newthread = new Thread(0,$_POST['title'],$_POST['content'],$forum_id,$user_id);

	$newthread->addThread();
	
		header("Location: http://localhost/PhpForum/forum.php?forumid=".$forum_id);
}
}

?>
 </div>
</div>
</form>
</body>
</html>
