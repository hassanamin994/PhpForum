<header>
<link href="http://fonts.googleapis.com/css?family=Lobster&subset=all" rel="stylesheet" type="text/css">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand font" href="#" style="font-size:30;">Jaguars' Forum</a>
    </div>
    <ul class="nav navbar-nav navbar-right font ">
      <li class="active"><a href="#">Home</a></li>
		<?php
		session_start(); 

		if(!isset($_SESSION['user'])){
			echo '<li><a href="login.php">Login</a></li>' ; 
			echo '<li><a href="registeration.php">Sign Up</a></li>';
		}else{

			if($_SESSION['role'] == "admin")
				echo '<li><a href="adminpanel.php">Admin Panel</a></li>';
			echo '<li><a href="profile.php">Profile</a></li>';
			echo '<li><a href="post.php">New Post</a></li>';
			echo '<li><a href="my_posts.php">My Posts</a></li>';
			echo '<li><a href="logout.php">Logout</a></li>' ;
		}
		?>
    </ul>
  </div>
</nav>
</header>

<?php 
if(isset($_SESSION['message'])){
	echo $_SESSION['message'];
	unset($_SESSION['message']);
}

?>