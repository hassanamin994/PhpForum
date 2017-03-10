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
     $threads=$forum->getTree(10);
     $forumname=$threads[0]['forum_name'];
      $_SESSION['forumid']=$threads[0]['forum_id'];
   
      $sticky=array(array());
      $normal=array(array());

      echo '<h2>'.$forumname.'</h2>';
      $thobjects=array();

     for($j=0;$j<count($threads);$j++){

      if($threads[$j]['stickybit']==1){ 
      // $current= new Thread($threads[$j]['thread_id'],$threads[$j]['thread_title'],$threads[$j]['thread_content'],$threads[$j]['forum_id'],$threads[$j]['ownerId'],0,1);

      // $res=$current->$title;
      //  echo $res;
          array_push($sticky,$threads[$j] );
       }
       else{
          array_push($normal,$threads[$j]);
      }
 }

//sticky posts
     for($i=1;$i<count($sticky);$i++){


      $content=$sticky[$i]['thread_content'];
      $currentthread= new Thread($sticky[$i]['thread_id'],$sticky[$i]['thread_title'],$sticky[$i]['thread_content'],$sticky[$i]['forum_id'],$sticky[$i]['ownerId']);
      array_push($thobjects, $currentthread);

      
   echo '
  <div class="media">
    <div class="media-left media-top" style="width:25%">
      <img src="'.$sticky[$i]['image'].'" class="media-object"style="width:150px">
      <br/>
      <p class ="glyphicon glyphicon-user">Posted by: '.$sticky[$i]['owner'].'</p>
      <p class="small"> On '.$sticky[$i]['date'].'</p>
      
    </div>
    <div class="media-body">
      <p class="glyphicon glyphicon-star">'.$sticky[$i]['thread_title'].'</p>
     <br>
    <p>'.substr($content,0,20).'...</p>
    <br>
    <p class="glyphicon glyphicon-comment">'.$sticky[$i]['numOfComments'].'</p>
    </div>
    <div style="float: right"> 
       <a href="viewmore.php?thid='.$sticky[$i]['thread_id'].'" class="btn btn-default glyphicon glyphicon-option-horizontal">Viewmore</a>
       ';
       if($_SESSION['userid']==$sticky[$i]['ownerId'] || $sticky[$i]['owner_role']=="admin"){
       echo '
    <button name="delbtn" class="btn btn-danger glyphicon glyphicon-trash">Delete</button>';
  }
  echo '</div>';

      if(isset($_POST['delbtn']))
      {
        $thobjects[$i]->deleteThread();
        header("Refresh:0");
      }
        echo '</div>';
}



//normal

 for($i=1;$i<count($normal);$i++){


      $content=$normal[$i]['thread_content'];
      $currentthread= new Thread($normal[$i]['thread_id'],$normal[$i]['thread_title'],$normal[$i]['thread_content'],$normal[$i]['forum_id'],$normal[$i]['ownerId']);
      array_push($thobjects, $currentthread);

      
   echo '
  <div class="media">
    <div class="media-left media-top" style="width:25%">
      <img src="'.$sticky[$i]['image'].'" class="media-object"style="width:150px">
      <br/>
      <p class ="glyphicon glyphicon-user">Posted by: '.$normal[$i]['owner'].'</p>
      <p class="small"> On '.$normal[$i]['date'].'</p>
      
    </div>
    <div class="media-body">
      <!--<h4 class="media-heading">Media Top</h4>-->
      <p>'.$normal[$i]['thread_title'].'</p>
     <br>
    <p>'.substr($content,0,20).'...</p>
    <br>
    <p class="glyphicon glyphicon-comment">'.$normal[$i]['numOfComments'].'</p>
    </div>
    <div style="float: right"> 
       <a href="viewmore.php?thid='.$normal[$i]['thread_id'].'" class="btn btn-default glyphicon glyphicon-option-horizontal">Viewmore</a>
       ';
       if($_SESSION['userid']==$normal[$i]['ownerId'] || $normal[$i]['owner_role']=="admin"){
       echo '
    <button name="delbtn" class="btn btn-danger glyphicon glyphicon-trash">Delete</button>';
  }
  echo '</div>';
      if(isset($_POST['delbtn']))
      {
        $thobjects[$i]->deleteThread();
        header("Refresh:0");
      }
      echo '</div>';
}
  ?>



</div>
</form>
</body>
</html>