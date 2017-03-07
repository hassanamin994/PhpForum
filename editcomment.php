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


  

   <div class="form-group">
  <h2>Edit Your Comment</h2>
  <textarea class="form-control" rows="7" id="comment" style="resize: none"></textarea>
</div>
<div>

<button class="btn btn-info" style="display: block; width: 100%;">Done</button>

</div>



       </div>
      
        </form>
          <div class="col-md-1"></div>
        <script src="assets/js/jquery-3.1.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>

