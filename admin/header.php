<header>
<link href="http://fonts.googleapis.com/css?family=Lobster&subset=all" rel="stylesheet" type="text/css">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand font" href="../index.php" style="font-size:30;">Jaguars' Forum</a>
    </div>
    <ul class="nav navbar-nav navbar-right font ">
      <li class="active"><a href="../index.php">Home</a></li>
		<?php
		// session_start();

		if(!isset($_SESSION['username'])){
			echo '<li><a href="login.php">Login</a></li>' ;
			echo '<li><a href="registeration.php">Sign Up</a></li>';
                       // echo '<li><a href="profile.php">Profile</a></li>';
		}
		else{
			echo '<li><a href="../userprofile.php">Profile</a></li>';
			echo '<li><a href="../logout.php">Logout</a></li>' ;
		}
    if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
    }
    else{
      header("Location: ../index.php");
    }
		?>
    </ul>
  </div>
</nav>
</header>

<?php


?>
