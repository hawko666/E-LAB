<?php
session_start();
if($_SESSION['user_name']==""){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<center>
	<div class="jumbotron bg-faded">
		<h1>
		<?php
		echo "Hello ".$_SESSION['user_name'];	
		?>
	</h1>
	<form  method="post" action="process.php">
		<input type="submit" name="logout_button" value="Logout" class="btn btn-danger">
	</form>
</div>
</center>
</body>
</html>