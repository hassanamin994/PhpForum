
<?php 
include_once('main.php');
include_once('header.php') ;
include_once('model/Thread.php');
session_start();
$_SESSION['user_id']="1";


// $thread_id=$_REQUEST['thread_id'];
$thread_id=1;
echo $thread_id;
$thread=new ThreadHandeller;
$arr=$thread->getTree($thread_id);
// foreach ($arr as $key => $value) {
//     echo "Key: $key; Value: <br/>";

// foreach ($value as $key2 => $value2) {
//     echo "Key: $key2; Value: $value2 <br/>";
// }

// }

echo $arr[0]['owner'];





$comment=new Comment;


if(isset($_POST['add'])){
$comment->addcommentUser($_SESSION['user_id'],$thread_id,$_POST['co']);
header("Refresh:0");






}




echo'
<html>
    <head>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body class="back">
    <form method="POST" action ="">
        <div class="col-md-1"></div>
        <div class="col-md-10 cont">


  <h2 >'.$arr[0]['thread_title'].' <small><i>Posted on '.$arr[0]['date'].'</i></small></h2><B><hr></B>
  <div class="media">
    <div class="media-left media-top" style="width:25%">









      <img src="'.$arr[0]['image'].' " class="media-object"style="width:150px">
      <br/>
      <p class ="glyphicon glyphicon-user">name: '.$arr[0]['owner'].' </p> <br/>
      <p class="glyphicon glyphicon-align-justify">Role: '.$arr[0]['role'].' </p><br/>
      <p class="glyphicon glyphicon-calendar">joined:'.$arr[0]['userdate'].' </p><br/>

    </div>
   <div class="media-body">
   '.$arr[0]['description'].'
      <!--<h4 class="media-heading">Media Top</h4>-->
      <!--</div>-->';
if($arr[0]['owner']==$_SESSION['user']||$_SESSION['role']=='admin')
{   echo '<div style="float: right">  <a href="editthread.php?edit_thread_id='.$arr[0]['thread_id'].'" class="btn btn-default glyphicon glyphicon-edit">Edit</a></div>';}
    

echo'

</div>

   <!--<hr> -->
 <h3>comments</h3>
<hr>
 


 <div class="form-group">
  <!--<label for="comment">Add Comment</label>-->';
if($_SESSION['user']!=""){
 echo' <textarea name= "co"class="form-control" rows="2" id="comment" style="resize: none"></textarea>
  </div>
  <div  style="float: right;">
  <button name="add"  class="btn btn-info" id="add" >Add Comment</button>
</div> </div>';}



//<!--nested-->


$fname="fname";
$last="last_update";
$created_at="created_at";
$userid="uid";
$im="image";
$role="role";
$body="body";
$edit="edit_by";
$username="username";
$cid="cid";


$comments=$comment->getAllComments($thread_id);
foreach ($comments as $key => $value) {
  echo"commentid is  $value[$cid]<br/>"; 
  



echo '<div class="media">

        <div class="media-left">
          <img src='."$value[$im]".' class="media-object" style="width:45px">
        </div>
        <div class="media-body">
          <h4 class="media-heading">'."$value[$fname]".'';
        if($value[$last]==""){  
          echo '<small><i> Posted on '."$value[$created_at]".'</i></small></h4>';}
         else {  
          echo '<small><i> Last updated on '."$value[$last]".' By :'."$value[$edit]".' </i></small></h4>';}
          
         echo' <p>'."$value[$body]".'</p> </div>';

         if($_SESSION['user_id']==$value[$userid]||$_SESSION['role']=='admin'){
echo'
<div style="float: right;"><a href="editcomment.php?comment_id='.$value["$cid"].'" class="btn btn-default glyphicon glyphicon-edit">Edit</a>
     
    <button  name="delete" class="btn btn-danger glyphicon glyphicon-trash" >Delete</a></div>
          </div>
        ';
        
         }
        if(isset($_POST['delete']))
        {
          $comment->deleteComment($value[$cid]);
        }
        
        




}
// }









     echo' <!--</div>-->


<!--end of nested 2-->

       </div>
      
        </form>
          <div class="col-md-1"></div>
        <script src="assets/js/jquery-3.1.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
';


?>