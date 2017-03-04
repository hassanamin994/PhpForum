
<?php 
require_once 'model/User.php';
require_once 'model/DBManager.php';
 include('header.php') ;




$username=$_POST['username'];
$fname=$_POST['fn'];
$lname=$_POST['ln'];

$dep=$_POST['department'];
$pw=md5($_POST['password']);

$gendre=$_POST['gender'];
$con=$_POST['countrey'];
$sub=$_POST['submit'];

$email=$_POST['email'];

if(isset($sub)){

 if($fname==''){echo"please entre first name"."<br/>";  $GLOBALS['flag']=0;}
if($lname==''){echo"please entre last name"."<br/>";$GLOBALS['flag']=0;}
 if($username==''){echo"please entre username"."<br/>";$GLOBALS['flag']=0;}
if($pw==''){echo"please entre password"."<br/>";$GLOBALS['flag']=0;}
 if(!isset($gendre)){echo"please choose gender"."<br/>";$GLOBALS['flag']=0;}
if(!isset($con)){echo"please choose country"."<br/>";$GLOBALS['flag']=0;}

if($flag==1){
  
//  $usermodel=new UserModel;
//  $usermodel->adduser($fname,$lname,$username,$pw,$add,$gendre,$dep,$con,$email);


header("Location: login.php");





}



}


echo '<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
   <link href="http://fonts.googleapis.com/css?family=Lobster&subset=all" rel="stylesheet" type="text/css">
         <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="back" >
 


     <div class="col-md-3"></div>
<div class="col-md-6 cont" >

    <div class="page-header " > <h1 style="font-size:28;  text-align: center;"><B>Registeration Form</B></h1>
    </div>

    <form class="form-horizontal" action="" method="POST">
 
        <div class="form-group">
            <label class="col-md-4 control-label" for="fn">First name</label>
            <div class="col-md-4">
                <input id="fn" name="fn" type="text" placeholder="first name" class="form-control input-md" required>
              <script type="text/javascript">
  document.getElementById("fn").value = "'; echo $_POST["fn"];echo '"
</script>

            </div>
        </div>
  
        <div class="form-group"  >
            <label class="col-md-4 control-label" for="ln">Last name</label>
            <div class="col-md-4">
                <input id="ln" name="ln" type="text" placeholder="last name" class="form-control input-md" required>
                              <script type="text/javascript">
  document.getElementById("ln").value = "'; echo $_POST["ln"];echo '"
</script>
 </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="username">username</label>
            <div class="col-md-4">
                <input id="username" name="username" type="text" placeholder="username" class="form-control input-md" required>
              <script type="text/javascript">
  document.getElementById("username").value = "'; echo $_POST["username"];echo '"
</script>
</div></div>




        <div class="form-group">
            <label class="col-md-4 control-label" for="password">password</label>
            <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required>

            </div>
        </div>
      

        <div class="form-group">
            <label class="col-md-4 control-label" for="email">email</label>
            <div class="col-md-4">
                <input id="email" name="email" type="email" placeholder="email" class="form-control input-md" required>

            </div>
        </div>

       


        <div class="form-group">
            <label class="col-md-4 control-label" for="gender">gender</label>
            <div class="col-md-4">
                <label class="radio-inline" for="male">
      <input type="radio" name="gender" id="male" value="male" checked="checked">
     male
    </label>
                <label class="radio-inline" for="female">
      <input type="radio" name="gender" id="female" value="female">
     female
    </label>
            </div>
        </div>



        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">countrey</label>
            <div class="col-md-4">
                <select id="selectbasic" name="countrey" class="form-control input-md" required>
      <option>Egypt</option>
      <option>usa</option>
      <option>france</option>
      <option>germany</option>
    </select>
           </div>
            
        </div> <div class="col-md-4"></div><div class="col-md-4" style="margin-top:5%;margin-bottom:5%">
<input type="submit" id="submit" name="submit" class="btn btn-info " style=" width:100%; font-size:24" value="Register"> </input><div class="col-md-4" "> 
</div><div class="col-md-4"></div>
        <br/>
        </div>
        
        </div>';







        echo'  
        
         </div>
        
        </div>








        <div class="form-group">


            
        </div>
     

        </div>




 <div class="col-md-3"></div>

    </form>';








?>
</body>
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</html>


