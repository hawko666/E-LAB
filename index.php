<?php
	include "conn.php";
	session_start();
	
if (isset($_POST['login_button']))
	{
		$_SESSION['alogin']=$_POST['uname'];
		$uname=$_POST['uname'];
		$pass=md5($_POST['psw']);

		$check_user=mysqli_query($conn,"select * from user where username_u='$uname' and pass='$pass'");
		$admin=mysqli_query($conn,"select username_u from user where uid='4'");
		$R=mysqli_fetch_array($admin);
		if(mysqli_num_rows($check_user)>0)
		{
			if($R[0]==$uname){
			//$_SESSION['user_name']=$uname;
			header("Location: 6days.com/Admin/index.php");	
			}
			else{
			header("Location: web/index.php");
			}
			
		}
		else
		{
			//$_SESSION['type']="danger";
			//$_SESSION['message']="Error while login";

			header("Location: index.php");
		}
	}
	if (isset($_POST['logout_button']))
	{
		session_unset();
		session_destroy();
		header("Location: index.php");
	}


	?>
<!DOCTYPE html>
<head>
	<title>elibrary</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/flexslider.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">



    <link rel="stylesheet" href="longin.css">


</head>
<body class="templatemo-black-bg">
	<nav id="responsive-menu">
        <ul class="menu-holder">
            <li class="active"><a href="#home"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="#about"><i class="fa fa-briefcase"></i>About</a></li>
            <li><a href="#products"><i class="fa fa-cogs"></i>Site</a></li>
            <li><a href="#services"><i class="fa fa-list"></i>Login</a></li>
        </ul>
    </nav>
	<div class="templatemo-nav-container">		
		<div class="container templatemo-white-bg">
			<div class="row">
				<nav class="hidden-xs text-uppercase templatemo-nav">
					<ul class="menu-holder">
						<li class="active"><a href="#home">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#products">Site</a></li>
						<li><a href="#services">Login</a></li>
					</ul>
				</nav>
				<div class="text-right visible-xs">
		            <a href="#" id="mobile_menu"><span class="fa fa-bars"></span></a>
		        </div>
			</div>			
		</div>
	</div>
	<section id="home">
		<div class="container">
			<div class="row">
				<div class="templatemo-home-left col-lg-4 col-md-5 col-sm-5 templatemo-white-bg">
					<div class="templatemo-logo">
						<h1 class="templatemo-site-name templatemo-blue-text">E-lab</h1>
						<span class="templatemo-slogan">Library for free</span>
					</div>
					<img src="images/black-curve.png" alt="Black Curve" class="templatemo-logo-bg">
				</div>
				<div class="templatemo-home-right col-lg-8 col-md-7 col-sm-7 templatemo-white-bg templatemo-gradient-bg">
					<h2 class="templatemo-dark-gray-text" style="padding-right: 20px padding-left: 0px">E-lab</h2>
					<h3 class="templatemo-dark-gray-text" style="padding-right: 20px padding-left: 0px">elibrary for free</h3>
					<p class="templatemo-home-text templatemo-light-gray-text"><em>E-lab is an online library from which one can download books for free only for personal use</em></p>
					<a href="#" class="text-uppercase templatemo-learn-more templatemo-blue-text">Learn More</a>
				</div>
			</div>
		</div>
	</section>
	<section id="about">
		<div class="container templatemo-white-bg">
			<div class="row">
				<div class="templatemo-about-left col-lg-5 col-md-5 col-sm-5">
					<h2 class="templatemo-blue-text">E-lab features</h2>
					<h3>some pros and cons</h3>
					<p class="templatemo-light-gray-text">On the site the book that are uploaded are the books that has loosed its copyright by author to avoide the issues that can cause in future. And advantages are below:</p>
					<ul class="templatemo-light-gray-text templatemo-about-list">
						<li>Direct download links</li>
						<li>Unlimited download</li>
						<li>Fast server</li>
						<li>All categories available</li>
						<li>Quick search</li>
						<li>Easy interface</li>
						<li>Less ads</li>
					</ul>
				</div>
				<div class="col-lg-7 col-md-7 col-sm-7 templatemo-about-right">
					<img src="images/smart-phone.png" alt="Smart Phone">
				</div>
			</div>
		</div>
	</section>
	<section id="products">
		<div class="container">
			<div class="row">
				<div class="templatemo-products-left col-lg-7 col-md-7 col-sm-7 templatemo-white-bg templatemo-gradient-bg">
					<h2 class="templatemo-red-text">how to use Site</h2>
					<h3>steps below</h3>
					<p class="templatemo-light-gray-text"><em>
						Its to easy you just need to login by clicking on login button and than put your userid and password if you have one if you dont have user is and password then press on register and create you new account ones account is created come back to the home page and login.
						</em>
					</p>
					<p class="templatemo-light-gray-text"><em>
						Ones you are logedin you can choose book you want to download then click on download button then your book will be download automaically.
					</em></p>
				</div>
				<div class="templatemo-products-right col-lg-5 col-md-5 col-sm-5 templatemo-white-bg">
					<a href="register.php" class="templatemo-products-link text-uppercase">
						<span class="first">Register</span>
						<span class="second">To go inside</span>
					</a>
					<img src="images/red-button.jpg" alt="Red Button" class="templatemo-red-btn pull-right">			
				</div>
			</div>
		</div>
	</section>
	<section id="services">
		<div class="container templatemo-white-bg text-center">
			<div class="row templatemo-services">
				<!--<h2 class="templatemo-blue-text">Lorem Ipsum</h2>
				<h3>Dolor Sit Amet Sedcurs</h3>-->
				<div class="col-lg-4 col-md-4 col-sm-4">
					<img src="images/services/1.png" alt="Services 1">
					<h4><em>Register</em></h4>
					<p class="templatemo-light-gray-text"><em>First click on register to create new account than login.</em></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<img src="images/services/2.png" alt="Services 2">
					<h4><em>Login</em></h4>
					<p class="templatemo-light-gray-text"><em>Login is essential to get access to the books on site to dowload. Login by typing username and password you have used during registration.</em></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<img src="images/services/3.png" alt="Services 3">
					<h4><em>Download</em></h4>
					<p class="templatemo-light-gray-text"><em>Ones you login you will be redirected to the site where you can search for book you want and than download it for free by clicking on download.</em></p>
				</div>
			</div>
		</div>
	</section>
	<section id="testimonials">
		<div class="container templatemo-white-bg">
			<div class="row">
				<div class="templatemo-testimonials-left col-lg-5 col-md-5 col-sm-5">
					<h2 class="templatemo-testimonials-header text-center" style="padding-left: 30px">
						<a class="nav-link"><button onclick="document.getElementById('id01').style.display='block'">LOGIN</button>
						
					</a>
					<span class="second">click here</span>
					</h2>
					<img src="images/blue-button.jpg" alt="Blue Button" class="templatemo-blue-btn">
				</div>
				<div class="templatemo-testimonials-right templatemo-gradient-bg col-lg-7 col-md-7 col-sm-7">
					<div class="slider">
						<div class="flexslider">
					  	<ul class="slides templatemo-light-gray-text text-center templatemo-em">
					    	<li>
					      		<p class="templatemo-testimonial-name">Thomas</p>
					      		<p><i class="fa fa-quote-left"></i>Nulla consectetur, mi sed fermentum sodales, nisl massa lacinia erat, eu commodo ipsum mi sit amet lacus. Donec sollicitudin tincidunt elit. Mauris posuere ex nec felis pretium porttitor.<i class="fa fa-quote-right"></i></p>
					    	</li>
					    	<li>
					      		<p class="templatemo-testimonial-name">Nathan</p>
					      		<p><i class="fa fa-quote-left"></i>Morbi pulvinar eleifend ante eget suscipit. Ut posuere nibh id lacus blandit, ac hendrerit turpis rhoncus. Sed felis justo, finibus id metus nec, ultricies pretium est. Nullam vel ex cursus, viverra augue quis, pharetra massa.<i class="fa fa-quote-right"></i></p>
					    	</li>
						    <li>
						      	<p class="templatemo-testimonial-name">Berry</p>
						      	<p><i class="fa fa-quote-left"></i>Pellentesque ultrices nulla sit amet augue aliquet egestas. Nulla erat nulla, maximus at auctor nec, suscipit ut est.<i class="fa fa-quote-right"></i></p>
						    </li>
						    <li>
						      	<p class="templatemo-testimonial-name">Julia</p>
						      	<p><i class="fa fa-quote-left"></i>Nullam aliquam tellus lorem, rutrum blandit ante tincidunt a. Duis ut ligula aliquam, maximus massa sit amet, finibus odio. Praesent eget lacus in dui consectetur aliquam quis at neque.<i class="fa fa-quote-right"></i></p>
						    </li>
						  </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer class="container templatemo-white-bg">
		<div class="row">
			<div class="col-lg-12">
				<p class="templatemo-copyright-container text-right text-uppercase small">
					<span class="templatemo-copyright-text">Copyright &copy; 2020 <a href="#">E-Lab</a></span>
					<span class="templatemo-copyright-design"></span>
				</p>
			</div>
		</div>		
	</footer>
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/templatemo_script.js"></script>

	<!--model-->
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="user.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" class="btn" name="login_button">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>	
