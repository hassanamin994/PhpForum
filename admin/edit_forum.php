<?php
session_start();
require_once '../init.php';
$categoryHandler = new CategoryHandeller();

if(isset($_GET['edit_id'])){
$forumID = $_GET['edit_id'] ;
$forumHandler = new ForumHandeller($forumID);
$forum = $forumHandler->getOneRow('id',$forumID);

}

if(isset($_POST['forum_id'])){
$forumID = $_POST['forum_id'] ;
$category_id = $_POST['category_id'] ;
$forum_name = $_POST['forum_name'] ;

$forumHandler = new ForumHandeller($forumID);
$forum = $forumHandler->getOneRow('id',$forumID);

$forum = new Forum($forumID,$forum_name, $category_id, $forum['locked']);
$errors = $forum->verify('edit');
if(empty($errors)){
		$forum->editforum() ;
		$_SESSION['message'] = "Forum Updated Successfully" ;
		header('Location: edit_forum.php?edit_id='.$forumID) ;
		unset($_POST);exit ;
}else{
	$_SESSION['errors'] = $errors ;
}


}
// $forum = new Forum($forum['id'], $forum['name'],$forum['category_id'], $forum['locked'] ) ;



$categories = $db->getAll("category");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body class='back'>

<?php include('../header.php') ; ?>
<?php include('sidebar.php') ; ?>


	<div class="col-xs-8 cont" style="padding:25px;">

		<div class="row">
			<?php
				 if(isset($errors)){
					 echo "<div class='alert alert-warning'>";
					 foreach ($errors as $error){
						 echo $error."<br>" ;
					 }
					 unset($_SESSION['errors']);

					 echo "</div>";
				 }
				 if(isset($_SESSION['message'])){
					 echo "<div class='alert alert-warning'>";
					 echo $_SESSION['message'];
					 echo "</div><br>";
					 unset($_SESSION['message']);
				 }
			 ?>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Forum Name | Category</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(isset($forum)){
							echo "<tr>";
							echo "<td>".$forum['id']."</td>";
							echo "<td>";
							echo "<form method='post' action='edit_forum.php'> " ;
							echo	"<input type='text' value='".$forum['name']."' name='forum_name' > ";
							echo "<input type='hidden' name = 'forum_id' value='".$forum['id']."' >";
							echo "	<select name='category_id'>  " ;
							foreach ($categories as $category) {
								echo "<option value='".$category['id']."' ";
								if($category['id'] == $forum['category_id'])
									echo "selected" ;
								echo " >".$category['name']."</option>" ;
							}
							echo "</select>";
							echo	"<input type='submit' value='Submit' class='btn btn-success' > ";
							echo	"</form>";
							echo "</td>";
							echo "<td>";
							echo $forum['locked']==0 ? "Open" : "Locked" ;
							echo "</td>" ;
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>




<?php include('../javascript.php') ;?>

</body>
</html>
