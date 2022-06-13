<?php
session_start();
include("conn.php");
$error = false;
/*if (isset($_POST['register'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $mname = mysqli_real_escape_string($con, $_POST['mname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $name = $fname.$mname.$lname;
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
//    $address=mysqli_real_escape_string($con, $_POST['addr']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
 //   $contact = mysqli_real_escape_string($con, $_POST['contact']);
  //  $date = mysqli_real_escape_string($con, $_POST['date']);

   


    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if (!preg_match("/^[a-zA-Z ]+$/",$mname)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }

    if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }



    if(mysqli_error($con))
    {
        $error=true;
        $email_error=mysqli_error($con)."<a href='login.php'>Click here to Login</a>";
    }

    
   /* if((!preg_match('/^[1-9][0-9]*$/', $contact))||(strlen($contact)!=10))
    {
        $error = true;
        $numbererror="Enter A valid Phone Number";
    }

    if (!$error) {

        if(mysqli_query($con, "INSERT INTO user(name,email,pass) VALUES('" . $name . "','" . $pass . "' ,'" . $email . "','" . "')"))
        {
            $successmsg = "Successfully Registered!  <a href='login.php'><u>Click here to Login</u></a>";
        } else {
            if(mysqli_error($con)=="Duplicate entry '$email' for key 'email'")
            {
                $email_error= "This Email ID Already registered !  <a href='login.php'><u>Click here to Login</u></a>";
            }
            $errormsg = "Error In Registering";
        }
    }

}*/

if(isset($_POST['register']))
{
  
    $fname =$_POST['fname'];
    $mname =$_POST['mname'];
    $lname =$_POST['lname'];
    $name=$fname." ".$mname." ".$lname;
       // $address =  $_POST['address'];
 // $contact =  $_POST['cnum'];
    $email =$_POST['email'];
   // $name =  $_POST['username'];
    $passwd = md5($_POST['password']);
    $usern = $_POST['uname'];
   // $photo =  addslashes($_FILES['fill']['tmp_name']);       header("Location: index.php");
  // 0- customer
  $result="INSERT INTO user (name, username_u, email, pass) VALUES ('$name', '$usern', '$email','$passwd')";

  if(mysqli_query($conn,$result)) {
        echo "New record created Successfully";    
  } else {
    echo "Error:" . $result . "<br>" . mysqli_error($conn);
  }

  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration form</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="form-v5">
	<div class="page-content">
		<div class="form-v5-content">
			<form class="form-detail" action="#" method="post">
				<h2>Register Account Form</h2>
				<div class="form-row">
					<label for="full-name">Full Name</label>
					<div class="row">
						<div class="col-lg-4">
						<input type="text" name="fname" id="full-name" class="input-text" placeholder="First Name" required>
					</div>
						<div class="col-lg-4">
						<input type="text" name="mname" id="full-name" class="input-text" placeholder="Middle Name" required>
					</div>
						<div class="col-lg-4">
						<input type="text" name="lname" id="full-name" class="input-text" placeholder="Last Name" required>
					</div>
						<i class="fas fa-user"></i>
						</div>
				</div>
                <div class="form-row">
                    <label for="username">Your Username</label>
                    <input type="text" name="uname" id="your-uname" class="input-text" placeholder="Your Username" required>
                    <i class="fas fa-envelope"></i>
                </div>
				<div class="form-row">
					<label for="your-email">Your Email</label>
					<input type="text" name="email" id="your-email" class="input-text" placeholder="Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-row">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="Your Password" required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Register">
				</div>
			</form>
		</div>
	</div>
</body>
</html>