<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sign Up</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">Pocket MetroCard</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="ContactUs.php">Contact</a></li>
						<li><a href="signup.php" class="button special">Sign Up</a></li>
						<li><a href="signin.php" class="button special">Sign In</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					 
					<section id="three" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2>Please fill out the form to register.</h2> 
				</div>
				
				<div class="container 50%">
					<form action="registeration.php" method="post">
						<div class="row uniform">
							<div class="6u 12u$(small)">
								<input name="firstname" id="name" value="" placeholder="First Name" type="text" required>
							</div>
							<div class="6u 12u$(small)">
								<input name="lastname" id="name" value="" placeholder="LastName" type="text" required>
							</div>
							<div class="6u 12u$(small)">
								<input name="dateofbirth" id="dateofbirth" value="" placeholder="YYYY-MM-DD(date of birth)" type="text" required>
							</div>
							<div class="6u 12u$(small)">
								<select name="gender"id="gender">
							<option selected disabled>Gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
								</select>
							</div>
							<div class="6u 12u$(small)">
								<input name="address" id="address" value="" placeholder="Address" type="text" required>
							</div>
							<div class="6u$ 12u$(small)">
								<input name="phone" id="phone" value="" placeholder="Phone Number" type="text" required>
							</div>
							<div class="6u 12u$(small)">
								<input name="email" id="email" value="" placeholder="Email" type="email" required>
							</div>
							<div class="6u 12u$(small)">
								<input name="password" id="password" value="" placeholder="Password" type="password" required>
							</div>
							 
							<div class="12u$">
								<ul class="actions">
									<li><input value="Sign Up" class="special big" type="submit"></li>
								</ul>

	
							</div>
						</div>
					</form>
				</div>
			</section>
				</div>
			</section>
 				
		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Pocket MetroCard. All rights reserved.</li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>
</html>