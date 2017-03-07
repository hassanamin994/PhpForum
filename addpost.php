<?php include('header.php'); ?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body class="back">
<div class="container cont">

<form method="post">
  <div class="form-group">
  Title <input type="text" class="form-control" id="title">
  <br>
  <textarea></textarea>
  <br>
  <button name="sub" type="submit">Add Post</button>
  </div>
</form>
</div>
</body>
</html>

<?php
// session_start();
if (isset($_POST['sub'])){

}
?>