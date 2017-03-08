<?php include('header.php') ;
include 'main.php';
//include 'model/Thread.php';
$_SESSION['userid']=1;

//sticky

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body class="back">
<form method="post">
<div class="container cont">
 <div style="float: right"> 
     <a href="addpost.php" class="btn btn-default glyphicon glyphicon-pencil">AddPost</a>
     </div>

  


     <?php

     $forum=new ForumHandeller();
     $threads=$forum->getTree(1);
     $forumname=$threads[0]['forum_name'];
     $_SESSION['forumid']=$threads[0]['forum_id'];
     //echo $threads[0]['thread_title']; 
    // $postid=$threads[0]['thread_id']; 
     //echo $postid;
    //$threads[0]->removeByID("id",$postid);
    // $forum->removeByID("id",0);

     echo '<h2>'.$forumname.'</h2>';
     $thobjects=array();
    

     for($i=0;$i<count($threads);$i++){

      $content=$threads[$i]['thread_content'];
      $currentthread= new Thread($threads[0]['thread_id'],$threads[0]['thread_title'],$threads[$i]['thread_content'],$threads[$i]['forum_id'],$threads[$i]['ownerId']);
      array_push($thobjects, $currentthread);

      
   echo '
  <div class="media">
    <div class="media-left media-top" style="width:25%">
      <img src="assets/img/u.png" class="media-object"style="width:150px">
      <br/>
      <p class ="glyphicon glyphicon-user">Posted by: '.$threads[$i]['owner'].'</p>
      <p class="small"> On '.$threads[$i]['date'].'</p>
      
    </div>
    <div class="media-body">
      <!--<h4 class="media-heading">Media Top</h4>-->
      <p>'.$threads[$i]['thread_title'].'</p>
     <br>
    <p>'.substr($content,0,20).'...</p>
    <br>
    <p class="glyphicon glyphicon-comment">'.$threads[$i]['numOfComments'].'</p>
    </div>
    <div style="float: right"> 
       <a href="viewmore.php?thid='.$threads[$i]['thread_id'].'" class="btn btn-default glyphicon glyphicon-option-horizontal">Viewmore</a>
       ';
       if($_SESSION['userid']==$threads[$i]['ownerId'] || $threads[$i]['owner_role']=="admin"){
       echo '
    <button name="delbtn" class="btn btn-danger glyphicon glyphicon-trash">Delete</button></div>
    </div>';
  }
      if(isset($_POST['delbtn']))
      {
        $thobjects[$i]->deleteThread();
        header("Refresh:0");
      }
}
  ?>



</div>
</form>
</body>
</html>