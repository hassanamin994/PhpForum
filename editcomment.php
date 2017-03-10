<?php 
session_start();
include ('main.php');
include('header.php') ;

if(empty($_REQUEST)){header("location: pagenotfound.php");}

$id=$_REQUEST['comment_id'];
$cid="id";
$comment=new Comment;
$arr=$comment->getcommentbyid($id);


$comment_userid=$arr[0]['user_id'];

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
        ';
if($comment->getcommentbyid($id)&&$_SESSION['username']!=""){
	
	
	if ($_SESSION['role']=='admin'||$_SESSION['id']==$comment_userid)
		      {
		echo'
                    <div class="form-group">
                    <h2>Edit Your Comment :</h2>
                    <label>description</label> <textarea  name="comment" class="form-control" rows="3" id="description"  value =""style="resize: none" required>'.$arr[0]['body'].'</textarea>
                    </div>
                    <div>
                    <button name="submit" class="btn btn-info" style="display: block; width: 100%;">Done</button>
                    </div>
                        </div> ';
	           }
	else{
		
		
		echo" <div class='alert alert-info'>You are not allowed to edit this post<br/></div>";
	   }
}



else{
	echo" <div class='alert alert-info'>invalid page<br/></div>";
	
}
echo' 
          <div class="col-md-1"></div>
        <script src="assets/js/jquery-3.1.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
         </form> </body>
</html>
';



if(isset($_POST['submit']))
{
	$comment->editComment( $_POST['comment'],$session['fname'],$id);
	echo" <div class='alert alert-info'>your changes have been saved <br/></div>";
	// 	header("location: forum.php");
	
}
?>