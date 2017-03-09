<?php 

include '../main.php';
include('../header.php') ;
var_dump($_SESSION);
 echo "psot ====>";
    var_dump($_POST);
//require_once 'model/User.php';
//require_once 'model/DBManager.php';
//include('header.php') ;
$username=$fname=$lname=$password=$email=$con=$gendre=$img="";
$edit=0;
$flag=1;
$dbm= new DBManager;
if(count($_POST)>0){
    echo "psot ====>";
    var_dump($_POST);
    $edit=1;
    $username=$_SESSION['username'];
    $fname=$_POST['fn'];
    $lname=$_POST['ln'];
    $target_dir = "../assets/uploads/";
    $password=$_POST['password'];
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);
    $target_file = $target_dir .$_SESSION['username'];
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $pw=md5($_POST['password']);

    $gendre=$_POST['gender'];
    $con=$_POST['country'];
    $sub=$_POST['save'];
    $img=$_FILES["fileToUpload"]["name"];
    $email=$_POST['email'];
}
if(count($_SESSION)>0){
    $username=$_SESSION['username'];
    //echo "username is : $username";
    $fname=$_SESSION['fname'];
    $lname=$_SESSION['lname'];
     //echo "lastname is : $lname";
    $target_dir = "assets/uploads/";
    $password=$_SESSION['password'];
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);
    $target_file = $target_dir .$_SESSION['username'];
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $img=$_SESSION['image'];
    $pw=$_SESSION['password'];

    $gender=$_SESSION['gender'];
    $con=$_SESSION['country'];
    

    $email=$_SESSION['email'];
}



if(isset($sub)){
	
	if($fname==''){
		echo"<div class='alert alert-info'> please entre first name"."<br/> </div>";
		$GLOBALS['flag']=0;
	}
    if($email==''){
		echo" <div class='alert alert-info'>please entre email"."<br/></div>";
		$GLOBALS['flag']=0;
	}
	if($lname==''){
		echo"<div class='alert alert-info'>please entre last name"."<br/></div>";
		$GLOBALS['flag']=0;
	}
	if($username==''){
		echo"<div class='alert alert-info'>please entre username"."<br/></div>";
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
	if(isset($_POST['save'])){
		if($flag==1){
			
			
	if ($dbm->getUser($username)!=""){




echo " <div class='container'> ";



//upload

 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       
        $uploadOk = 1;
    } else {
        echo "<div class='col-md-3'></div> <div class='col-md-6 alert alert-info'>File is not an image.</div><div class='col-md-3'></div>";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo " <div class='alert alert-info'>Sorry, file already exists.</div>";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo " <div class='alert alert-info'>Sorry, your file is too large.</div>";
    $uploadOk = 0;
}
// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//     echo " <div class='alert alert-info'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
//     $uploadOk = 0;
// }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // echo " <div class='col-md-3'></div> <div class='col-md-6 alert alert-info'> Sorry, your file was not uploaded.</div> <div class='col-md-3'></div> ";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       
     
	echo "target".$target_file;
    $pic2=$target_file;
   


    } else {
        echo " <div class='alert alert-info'>Sorry, there was an error uploading your file.</div>";
    }}





                            

				$banned=0;
				echo"-->";
				$signature="sig";
				$role="user";
                                $key=['id'=>$_SESSION['id']];
                                $data=['username'=>$username,'password'=>$password,'email'=>$email,'fname'=>$fn,'lname'=>$ln,'gender'=>$gender,'country'=>$con,'banned'=>$banned,'image'=>$pic2,'signature'=>$signature,'role'=>$_SESSION['role'],''];
				var_dump($data);
                                $user=new UserHandeller();
				$user->update($key, $data);
				
                if($uploadOk == 1){
                    echo"ok";
                    
			header("Location: profile.php");
                        var_dump($data);
            }
			}
			else {
				echo '
                 <div class="alert alert-info">
                <strong>Sorry!</strong> username already taken ! please try another one .
</div>';
			}
			
			//
			
		}

}
echo "</div>";
}
echo '<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
   <link href="http://fonts.googleapis.com/css?family=Lobster&subset=all" rel="stylesheet" type="text/css">
         <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body class="back" >
 <input id="fn" name="sig" id="sig" value="signature"   type="hidden" >
  <input id="fn" name="role"  id="role" value="user"   type="hidden" >
   <input id="fn" name="pic" id= "pic" value="pic"  type="hidden">
     <div class="col-md-3"></div>
<div class="col-md-6 cont" >
    <div class="page-header " > <h1 style="font-size:28;  text-align: center;"><B>Your Profile</B></h1>
    </div>
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-md-4 control-label" for="fn">First name</label>
            <div class="col-md-4">
                <input id="fn" name="fn" type="text" placeholder="first name" class="form-control input-md" '; if(isset($fname)){echo "value=".$fname ;}else{echo "value="." " ;};echo' required >
              <script type="text/javascript">
  document.getElementById("fn").value = "';
//echo $_POST["fn"];
echo '"
</script>
            </div>
        </div>
        <div class="form-group"  >
            <label class="col-md-4 control-label" for="ln">Last name</label>
            <div class="col-md-4">
                <input id="ln" name="ln" type="text" placeholder="z" class="form-control input-md" '; if(isset($lname)){echo "value="."$lname" ;}else{echo "value="." xxx" ;};echo' required >
                              <script type="text/javascript">
  document.getElementById("ln").value = ""';
//echo $_POST["ln"];
echo '"
</script>
 </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="username">username</label>
            <div class="col-md-4">
                <label >'; if(isset($username)){echo $username ;}else{echo "uuuu " ;};echo'</label>
              ';
//echo $_POST["username"];
echo '"
</script>
</div></div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="password">password</label>
            <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" '; if(isset($password)){echo "value=".$password ;}else{echo "value="." " ;};echo' required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">email</label>
            <div class="col-md-4">
                <input id="email" name="email" type="email" placeholder="email" class="form-control input-md" '; if(isset($email)){echo "value=".$email ;}else{echo "value="." " ;};echo' >
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="gender">gender</label>
            <div class="col-md-4">
                <label class="radio-inline" for="male">
      <input type="radio" name="gender" id="male" value="male"  '; if(isset($_POST['gender']) &&$_POST['gender']=="male" ||$_SESSION['gender']=='male'){echo "checked" ;};echo' >
     male
    </label>
                <label class="radio-inline" for="female">
      <input type="radio" name="gender" id="female" value="female" '; if(isset($_POST['gender'])&&$_POST['gender']=="female" ||$_SESSION['gender']=='female'){echo "checked" ;};echo' >
     female
    </label>
            </div>
        </div>

<!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">countrey</label>
            <div class="col-md-4">
                <select id="selectbasic" name="country" class="form-control input-md" required>
                    <option value="">Select one</option>
                   <option value="Egypt" ' ; if(isset ($con) && $con=='Egypt'){echo "selected" ;};echo ' >Egypt</option>
                   <option value="USA" ' ; if(isset ($con) && $con=='USA'){echo "selected" ;};echo ' >USA</option>
                   <option value="France" ' ; if(isset ($con) && $con=='France'){echo "selected" ;};echo ' >France</option>
                   <option value="Germany" ' ; if(isset ($con) && $con=='Germany'){echo "selected" ;};echo ' >Germany</option>
              </select>
           </div>
        </div> 
        
         <div class="form-group">
            <label class="col-md-4 control-label" for="">profile img</label>
            <div class="col-md-2">
                <img src= "';if(isset($img)){echo "../$img";}; echo '"  class="img-responsive img-thumbnail" alt="profile img" >
            </div>
        </div>
         <div class="form-group">
            <label class="col-md-4 control-label" >Upload a Picture</label>
            <div class="col-md-4">
              
            <input type="file" name="fileToUpload" id="fileToUpload"  ></input>
   
   
             
            </div>
        </div>

        <div class="col-md-4"></div>
        <div class="col-md-4" style="margin-top:5%;margin-bottom:5%">" ';
 
      echo ' "<input type="submit" id="save" name="save" class="btn btn-info " style=" width:100%; font-size:24" value="Save"> </input><div class="col-md-4" "> " ';
  
 
      



echo ' "</div>
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
<script src="../assets/js/jquery-3.1.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</html>
