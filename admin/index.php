<?php


require_once '../init.php';
if(isset($_GET['lock'])){
	if(file_exists('../lock')){
		unlink('../lock');
		header('Location: index.php');
	}else{
		$myfile = fopen("../lock", "w");
		header('Location: index.php');
	}
}
$users = count($db->getAll('user'));
$threads = count($db->getAll('thread'));
$forums = count($db->getAll('thread'));
$categories = count($db->getAll('thread'));

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="admin.css">
	<style type="text/css">
		.page-content{
			text-align: center;
		}
	</style>
</head>
<body>

<?php include('header.php') ; ?>
<?php include('sidebar.php') ; ?>

<div class="page-content">
	<div class="col-xs-8">

		<div class="row">
				<div class="col-xs-3"><?php echo $categories ; ?><br>No. Of Categories</div>
				<div class="col-xs-3"><?php echo $forums ; ?><br>No. Of Forums</div>
				<div class="col-xs-3"><?php echo $threads ; ?><br>No. Of Threads</div>
				<div class="col-xs-3"><?php echo $users ; ?><br>No. Of Users</div>
		</div>

	</div>
</div>



<?php include('../javascript.php') ;?>

</body>
</html>
