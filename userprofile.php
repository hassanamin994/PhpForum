<?php

include ('main.php');
include('header.php') ;
if(empty($_SESSION))
{header("location: pagenotfound.php");}

if(isset($_POST['submit'])){
    header("location: editprofile.php");
}
?>
            <html>
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href='http://fonts.googleapis.com/css?family=Lobster&subset=all' rel='stylesheet' type='text/css'>
                <link href="assets/css/bootstrap.min.css" rel="stylesheet">
                <link href="assets/css/style.css" rel="stylesheet">
            </head>
            <body class="back">

                <div class="col-md-3"></div>
                <div class="col-md-6 cont" >




<div class="media">
<br/>
    <h2 class="media-heading">My Profile</h2>
     <br/> <br/>
  <div class="media-left">
    <img src="<?php echo $_SESSION['image'] ;?>" class="media-object" style="width:150px">
  </div>
  <div class="media-body">

  <h2><B>First name.............. </B>  <?=$_SESSION['fname']?> </h2>
     <h2><B>Last name...............</B><?=$_SESSION['lname']?> </h2>
     <h2><B>username...............</B> <?=$_SESSION['fname']?> </h2>
     <h2><B>country...............</B> <?=$_SESSION['country']?> </h2>
     <h2><B>gender...............</B> <?=$_SESSION['gender']?> </h2> </div>
     <form method="POST">
      <button id="submit" name="submit" class="btn btn-info " style=" font-size:24 ">edit profile</button>
     <form>

</div>
</div>







              </div>
                </div>

                                <div class="col-md-3"></div>
       </body>
            <script src="assets/js/jquery-3.1.1.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            </html>
