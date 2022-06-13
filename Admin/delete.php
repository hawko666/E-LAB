<?php
 include 'pages/forms/conn.php';
  if(isset($_GET['delete']))
{

	$id=$_GET['delete'];
	$delete=mysqli_query($conn,"DELETE from book where bid=$id");
	if (!$delete) {
	    $_SESSION['type']="danger";

	    $_SESSION['error']="error in deletion";
	    header("Location: index.php");

	}
	else{
        $_SESSION['type']="danger";

	    $_SESSION['error']="User Deleted ";
	    header("Location: index.php");

	}
}

?>