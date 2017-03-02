<?php



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

<?php include('../header.php') ; ?>
<?php include('sidebar.php') ; ?> 

<div class="page-content">
	<div class="col-xs-8">
	
		<div class="row">
				<div class="col-xs-3"><?php echo "2" ; ?><br>No. Of Categories</div>
				<div class="col-xs-3"><?php echo "5" ; ?><br>No. Of Forums</div>
				<div class="col-xs-3"><?php echo "15" ; ?><br>No. Of Threads</div>
				<div class="col-xs-3"><?php echo "4" ; ?><br>No. Of Users</div>
		</div>

	</div>
</div>



<?php include('../javascript.php') ;?>

</body>
</html>