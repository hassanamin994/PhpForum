<?php 
session_start();
include ('main.php');
include('header.php') ;
include_once('model/Thread.php');
require_once 'model/DBManager.php';
$id=$_REQUEST['edit_thread_id'];
$thread=new ThreadHandeller;
$arr=$thread->getTree($id);

if(empty($arr)){
	echo" <div class='alert alert-danger'>invalid page<br/></div>";
}
else {
	$thread_owner=$arr[0]['owner'];
	if ($_SESSION['role']=='admin'||$_SESSION['user']==$thread_owner)
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
  <h2>Edit Your thread </h2>
 <label>Title</label> <textarea   class="form-control" rows="2" name="title"  value =""style="resize: none" required>'.$arr[0]['thread_title'].'</textarea>
 <label>description</label> <textarea   class="form-control" rows="7" name="description"  value =""style="resize: none" required>'.$arr[0]['description'].'</textarea>
</div>
<div>
<button name="submit" class="btn btn-info" style="display: block; width: 100%;">Done</button>';


if(isset($_POST['submit']))
{
	if($_POST['title']!="" &&$_POST['description']!= "")
    {$th=new Thread;
	echo "test".$_POST['title'],$_POST['description'];
	
	$th->updateThread('1',$_POST['title'],$_POST['description']);
    }
	else {echo" <div class='alert alert-danger'>you can't leave the thread empty<br/></div>";}
	// 	header("location: forum.php");
	
}

echo'</div>
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


?>