<?php 

include ('main.php');
include('header.php') ;
include_once('model/Thread.php');
require_once 'model/DBManager.php';
if(empty($_REQUEST)||empty($_SESSION)){header("location: pagenotfound.php");}
$id=$_REQUEST['edit_thread_id'];
//echo "fname=".$_SESSION["fname"];
$thread=new ThreadHandeller;
$arr=$thread->getTree($id);


		echo'
<html>
    <head>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body class="back">
    <form method="POST">
        <div class="col-md-1"></div>
        <div class="col-md-10 cont">';

if(empty($arr)){
	echo" <div class='alert alert-danger'>invalid page<br/></div>";
}
else {
	$thread_owner=$arr[0]['owner'];
	if ($_SESSION['role']=='admin'||$_SESSION['username']==$thread_owner)
		{


  echo' <div class="form-group">
  <h2>Edit Your thread </h2>
 <label>Title</label> <textarea   class="form-control" rows="2" name="title" id="title" style="resize: none" required>'.$arr[0]['thread_title'].'</textarea>
 <label>description</label> <textarea   class="form-control" rows="7" id="description"  name="description"  style="resize: none" required>'.$arr[0]['description'].'</textarea>
</div>
<div>
<button name="submit" class="btn btn-info" >Done</button>
<button name="back" class="btn btn-info" >back</button>';
if(isset($_POST['back'])){
	header("location: thread.php?thread_id=$id");}
if(isset($_POST['submit']))
{
	if($_POST['title']!="" &&$_POST['description']!= "")
    {$th=new Thread;
	//echo "test".$_POST['title'],$_POST['description'];
	//echo "fname=".$_SESSION["fname"];
	$th->updateThread($id,$_POST['title'],$_POST['description'],$_SESSION["fname"]);


  echo '<script type="text/javascript">
  document.getElementById("title").value = "';echo $_POST['title'];echo'" 
      
  </script>';
 

 echo '<script type="text/javascript">
  document.getElementById("description").value = "'; echo $_POST['description'];echo'"</script>';
echo" <div class='alert alert-info'>your changes have been saved<br/></div>";
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