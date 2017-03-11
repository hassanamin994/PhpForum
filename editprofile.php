<?php 
include './main.php';
include('./header.php') ;

if(empty($_SESSION))
{header("location: pagenotfound.php");}
$flag=1;
$dbm= new DBManager;


    $target_file = $target_dir .$_POST['email'];
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $pw=md5($_POST['password']);


$fname=$_POST['fn'];
$lname=$_POST['ln'];
$target_dir = "assets/uploads/";


    $gendre=$_POST['gender'];
    $con=$_POST['countrey'];
    $sub=$_POST['submit'];


// $target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);
$target_file = $target_dir .$_POST['email'];
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);







if(isset($sub)){
	
	if($fname==''){
		echo"<div class='alert alert-info'> please entre first name"."<br/> </div>";
		$GLOBALS['flag']=0;
	}
    
	if($lname==''){
		echo"<div class='alert alert-info'>please entre last name"."<br/></div>";
		$GLOBALS['flag']=0;
	}

	if($pw==''){
		echo" <div class='alert alert-info'>please entre password"."<br/></div>";
		$GLOBALS['flag']=0;
	}
	if(!isset($gendre)){
		echo"<div class='alert alert-info'>please choose gender"."<br/></div>";
		$GLOBALS['flag']=0;
	}
	if(!isset($con)){
		echo" <div class='alert alert-info'>please choose country"."<br/></div>";
		$GLOBALS['flag']=0;
	}

 if(  $uploadOk ==0){
		echo" <div class='alert alert-info'>upload a picture"."<br/></div>";
		$GLOBALS['flag']=0;
	}

	if(isset($_POST['submit'])){
		if($flag==1){
			
			
		




echo " <div class='container'> ";



//upload

 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       
        $uploadOk = 1;
    } else {
       // echo "<div class='col-md-3'></div> <div class='col-md-6 alert alert-info'>please upload a picture.</div><div class='col-md-3'></div>";
       $pic2=$_SESSION['image'];
    }

// Check if file already exists
// if (file_exists($target_file)) {
//     echo " <div class='alert alert-info'>Sorry, file already exists.</div>";
//     $uploadOk = 0;
// }

if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo " <div class='alert alert-info'>Sorry, your file is too large.</div>";
    $uploadOk = 0;
}
// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//     echo " <div class='col-md-3'></div> <div class='col-md-6 alert alert-info'>Only jpg,png formats are allowed.</div><div class='col-md-3'></div>";
//     $uploadOk = 0;
// }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // echo " <div class='col-md-3'></div> <div class='col-md-6 alert alert-info'> Sorry, your file was not uploaded.</div> <div class='col-md-3'></div> ";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       
     
	
    $pic2=$target_file;
   


    } else { $pic=$_SESSION['image'];
       // echo " <div class='alert alert-info'>Sorry, there was an error uploading your file.</div>";
    }}







				//$banned=0;
				
				$signature=$_POST['sig'];
				//$role="user";
			
		
                if($uploadOk == 1){
echo "email".$email;
              $key=['id'=>$_SESSION['id']];
              $data=['password'=>$pw,'fname'=>$fname,'lname'=>$lname,'gender'=>$gendre,'country'=>$con,'banned'=>$_SESSION['banned'],'image'=>$pic2,'signature'=>$signature,'role'=>$_SESSION['role']];
				var_dump($data);
                                $user=new UserHandeller();
				$user->update($key, $data);
$_SESSION['fname']=$fname;
$_SESSION['lname']=$lname;
$_SESSION['gender']=$gendre;
//echo 'pic is '.$pic2;
$_SESSION['image']=$pic2;
$_SESSION['signature']=$signature;
$_SESSION['country']=$con;
			

			header("Location: userprofile.php");
            }
			}
			else {
				echo '
                 <div class="alert alert-info">
                <strong>Sorry!</strong> this Email is already registered !.<a href="login.php">sign in ?</a>
</div>';
			}
			
			//
			
		}

}
echo "</div>";

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
    <div class="page-header " > <h1 style="font-size:28;  text-align: center;"><B>Edit profile</B></h1>
    </div>
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-md-4 control-label" for="fn">First name</label>
            <div class="col-md-4">
                <input id="fn" name="fn" type="text" placeholder="first name" class="form-control input-md" required>
              <script type="text/javascript">
  document.getElementById("fn").value = "';
echo $_SESSION["fname"];
echo '"
</script>
            </div>
        </div>
        <div class="form-group"  >
            <label class="col-md-4 control-label" for="ln">Last name</label>
            <div class="col-md-4">
                <input id="ln" name="ln" type="text" placeholder="last name" class="form-control input-md" required>
                              <script type="text/javascript">
  document.getElementById("ln").value = "';
echo $_SESSION["lname"];
echo '"
</script>
 </div>
        </div>

       

        <div class="form-group">
            <label class="col-md-4 control-label" for="password">password</label>
            <div class="col-md-4">
                
                <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required>
            
             <script type="text/javascript">
  document.getElementById("password").value = "';
echo $_SESSION["password"];
echo '"
</script>
            </div>
        </div>
        

 <div class="form-group">
            <label class="col-md-4 control-label" for="email">signature</label>
            <div class="col-md-4">
                <input id="sig" name="sig" type="text"  class="form-control input-md" required>
            <script type="text/javascript">
  document.getElementById("sig").value = "';
echo $_SESSION["signature"];
echo '"
</script>
            </div>

        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="gender"  >gender</label>
            <div class="col-md-4">
                <label class="radio-inline" for="male">
      <input type="radio" name="gender" id="male" value="male" '; if($_SESSION['gender']=="male") echo "checked";echo'>
     male
    </label>
                <label class="radio-inline" for="female">
      <input type="radio" name="gender" id="female" value="female" '; if($_SESSION['gender']=="female") echo "checked";echo'>
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
        </div> 
        
        
         <div class="form-group">
            <label class="col-md-4 control-label" >Upload a Picture</label>
            <div class="col-md-4">
              
      <input type="file" name="fileToUpload" id="fileToUpload" ></input>
   
   
             
            </div>
        </div>

        <div class="col-md-4"></div>
        <div class="col-md-4" style="margin-top:5%;margin-bottom:5%"> ';
  
 
      echo ' <input type="submit" id="submit" name="submit" class="btn btn-info " style=" width:100%; font-size:24" value="Save"> </input> ';

      



echo ' </div>
    <div class="col-md-4"></div>
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
