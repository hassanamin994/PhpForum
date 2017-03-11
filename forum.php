<?php
include 'init.php';
include('header.php') ;
//include 'model/Thread.php';
//$_SESSION['id']=1;
if(empty($_REQUEST)){header("location: pagenotfound.php");}
$forum_id = $_REQUEST['forumid'];

$forum = new ForumHandeller() ;
$forum = $forum->getOneRow('id',$forum_id);

if(isset($_POST['delbtn']))
{
  $db = new DBManager() ;
  $db->makeQuery("DELETE FROM `thread` WHERE id='".$_POST['thread_id']."'");
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body class="back">
<form method="post">
<div class="container cont">
    <?php
    if(!$forum['locked']){?>
      <div style="float: right">
        <a href="addpost.php?forumid=<?php echo $forum_id; ?>" class="btn btn-default glyphicon glyphicon-pencil">AddPost</a>
      </div>
  <?php }

    ?>
     <?php

      $forum=new ForumHandeller();
      $threads=$forum->getTree($forum_id);
      $sticky=array();
      $normal=array();
     for($j=0;$j<count($threads);$j++){

      if($threads[$j]['stickybit']==1){
          array_push($sticky,$threads[$j] );
       }
       else{
          array_push($normal,$threads[$j]);
      }
 }


//sticky
  ?>
  <h1>Sticky Posts</h1>
  <?php

    foreach ($sticky as $stickyPost) {
      ?>

      <div class="media">
          <div class="media-left media-top" style="width:25%">
              <img src="<?php echo $stickyPost['owner_img'] ; ?>" class="media-object" style="width:150px">
              <br/>
              <p class="glyphicon glyphicon-user">Posted by: <?php echo $stickyPost['owner'] ; ?> </p>
              <p class="small"> On <?php echo $stickyPost['date'] ; ?></p>

          </div>
          <div class="media-body">
              <p class="glyphicon glyphicon-star"></p>
              <br>
              <p><?php echo $stickyPost['thread_title'] ; ?></p>
              <br>
              <p class="glyphicon glyphicon-comment"></p>
          </div>
          <div style="float: right">
              <a href="thread.php?thread_id=<?php echo $stickyPost['thread_id'] ?>" class="btn btn-default glyphicon glyphicon-option-horizontal">Viewmore</a>
              <?php
                if(isset($_SESSION['id']) && ($_SESSION['role'] == 'admin' || $_SESSION['id'] == $stickyPost['ownerId'] )){
              ?>
              <form  method="post">
                  <input type="hidden" name="thread_id" value="<?php echo $stickyPost['thread_id'] ?>">
                  <input name="delbtn" type="submit" class="btn btn-danger glyphicon glyphicon-trash" value = "Delete " >
              </form>
              <?php } ?>
          </div>
      </div>
    <?php }
   ?>
   <hr>
   <?php

   // normal
     foreach ($normal as $normalPost) {
       ?>

       <div class="media">
           <div class="media-left media-top" style="width:25%">
               <img src="<?php echo $normalPost['owner_img'] ; ?>" class="media-object" style="width:150px">
               <br/>
               <p class="glyphicon glyphicon-user">Posted by: <?php echo $normalPost['owner'] ; ?> </p>
               <p class="small"> On  <?php echo $normalPost['date'] ; ?></p>

           </div>
           <div class="media-body">
               <p><?php echo $normalPost['thread_title'] ; ?></p>
               <br>
               <p class="glyphicon glyphicon-comment"></p>
           </div>
           <div style="float: right">
               <a href="thread.php?thread_id=<?php echo $normalPost['thread_id'] ?>" class="btn btn-default glyphicon glyphicon-option-horizontal">Viewmore</a>
               <?php
                 if(isset($_SESSION['id']) && ($_SESSION['role'] == 'admin' || $_SESSION['id'] == $normalPost['ownerId'] )){
               ?>
               <form  method="post">
                   <input type="hidden" name="thread_id" value="<?php echo $normalPost['thread_id'] ?>">
                   <input name="delbtn" type="submit" class="btn btn-danger glyphicon glyphicon-trash" value = "Delete " >
               </form>
               <?php } ?>
           </div>
       </div>
     <?php }
    ?>

</div>
</form>
</body>
</html>
