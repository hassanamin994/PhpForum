<?php 
session_start();
include ('main.php');
include('header.php') ;
// $id=$_REQUEST['edit_comment_id'];
$id=1;
$comment=new CommentHandeller;
$arr=$comment->getTree($id);

if(empty($arr)){
	echo" <div class='alert alert-danger'>invalid page<br/></div>";
}
else {
	$comment_owner=$arr[0]['owner'];
	if ($_SESSION['role']=='admin'||$_SESSION['user']==$comment_owner)
	{
		echo'
<html>
    <head>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body class="back">
    <form method="POST">
        <div class="col-md-1"></div>
        <div class="col-md-10 cont">
   <div class="form-group">
  <h2>Edit Your Comment :</h2>
 
 <label>description</label> <textarea   class="form-control" rows="3" id="description"  value =""style="resize: none" required>'.$arr[0]['description'].'</textarea>
</div>
<div>
<button name="submit" class="btn btn-info" style="display: block; width: 100%;">Done</button>
</div>
       </div>
        </form>
          <div class="col-md-1"></div>
        <script src="assets/js/jquery-3.1.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
';
	}
	else{
		
		
		echo" <div class='alert alert-danger'>You are not allowed to edit this post<br/></div>";
	}
}

if(isset($_POST['submit']))
{

// header("location: forum.php");

}
?>