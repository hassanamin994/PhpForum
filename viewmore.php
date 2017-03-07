
<?php 
include ('main.php');
include('header.php') ;

//$category=new CategoryHandeller();
//$numOfForums=$category->getCount();





















?>
<html>
    <head>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body class="back">
    <form>
        <div class="col-md-1"></div>
        <div class="col-md-10 cont">


  <h2 >Thread  name </h2>
  <div class="media">
    <div class="media-left media-top" style="width:25%">



      <img src="assets/img/u.png" class="media-object"style="width:150px">
      <br/>
      <p class ="glyphicon glyphicon-user">name:  user </p> <br/>
      <p class="glyphicon glyphicon-align-justify">Role: Admin </p><br/>
      <p class="glyphicon glyphicon-calendar">joined: 22-2-2017 </p><br/>

    </div>
   <div class="media-body">
      <!--<h4 class="media-heading">Media Top</h4>-->
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    
   
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    <!--</div>-->
   <div style="float: right">  <a href="" class="btn btn-default glyphicon glyphicon-edit">Edit</a>
       <a href="" class="btn btn-default glyphicon glyphicon-pencil">Reply</a>
    <!--<a href="" class="btn btn-danger glyphicon glyphicon-trash">Delete</a></div>-->

</div>
</div>

   <!--<hr> -->
 <h3>comments</h3>
<hr>
 


 <div class="form-group">
  <!--<label for="comment">Add Comment</label>-->
  <textarea class="form-control" rows="2" id="comment" style="resize: none"></textarea>
  </div>
  <div  style="float: right;">
  <button class="btn btn-info"  >Add Comment</button>
</div> </div>



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


