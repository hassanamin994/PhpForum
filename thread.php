
<?php 
include ('main.php');
include('header.php') ;
session_start();



// $thread_id=$_REQUEST['thread_id'];
$thread_id=1;
echo $thread_id;
$thread=new ThreadHandeller;
$arr=$thread->getTree($thread_id);
foreach ($arr as $key => $value) {
    echo "Key: $key; Value: <br/>";

foreach ($value as $key2 => $value2) {
    echo "Key: $key2; Value: $value2 <br/>";
}

}

echo $arr[0]['owner'];


// Key: forum_name; Value: my forum
// Key: thread_id; Value: 1
// Key: thread_name; Value: my thread name
// Key: thread_title; Value: my thread title
// Key: ownerId; Value: 1
// Key: owner; Value: root
// Key: image; Value:
// Key: date; Value: 2017-03-07 22:21:05
// Key: numOfComments; Value: 0










echo'
<html>
    <head>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body class="back">
    <form>
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
 echo' <textarea class="form-control" rows="2" id="comment" style="resize: none"></textarea>
  </div>
  <div  style="float: right;">
  <button class="btn btn-info"  >Add Comment</button>
</div> </div>';}

echo'

<!--nested-->


<div class="media">

        <div class="media-left">
          <img src="assets/uploads/female1.png" class="media-object" style="width:45px">
        </div>
        <div class="media-body">
          <h4 class="media-heading">John Doe <small><i>Posted on February 19, 2016</i></small></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

<div style="float: right;"><a href="" class="btn btn-default glyphicon glyphicon-edit">Edit</a>
     
    <a href="" class="btn btn-danger glyphicon glyphicon-trash" >Delete</a></div>
          </div>
        </div>
      <!--</div>-->

<!---->

<!--end of nested 1-->
<div class="media">

        <div class="media-left">
          <img src="assets/uploads/female2.png" class="media-object" style="width:45px">
        </div>
        <div class="media-body">
          <h4 class="media-heading">John Doe <small><i>Posted on February 19, 2016</i></small></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<div style="float: right"><a href="" class="btn btn-default glyphicon glyphicon-edit">Edit</a>
     
    <a href="" class="btn btn-danger glyphicon glyphicon-trash">Delete</a></div>
          </div>
          
        </div>
      </div>
<!--end of nested 2-->

       </div>
      
        </form>
          <div class="col-md-1"></div>
        <script src="assets/js/jquery-3.1.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
;'

?>