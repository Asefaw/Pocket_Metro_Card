<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
 <?php
 	session_start()
 	 
	 
 ?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Transit by TEMPLATED</title>
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
<style type="text/css">\
    #header{
            padding:1em;
    }
    #baner {
    background-image: url(images/dark_tint.png), url(images/bokeh_car_lights_bg.jpg);
    background-position: center center;
    background-size: cover;
    color: #ffffff;
    padding: 1em 0em 1em;
     
    }
    #sectionone{
    padding-left: 2em;
    text-align: left;
    }
    #main_content{
     padding-top: 15px;
     padding-left: 25px;

    }
    #newcardform{
    	 
    	border: 3px solid;
    	background-color: #CCCCCC;
    	text-indent: left;
    	 
    }
    #amount {width: 100px; background-color: white;}
    #payment{
    	width: 200px; background-color: white;
    	padding: 3px;
    }

</style>
	</head>
	<body class="landing">
	 

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">Pocket Metro Card</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="ContactUs.php">Contact</a></li>
						<li><a href="signup.php" class="button special">Sign Up</a></li>
						<li><a href="signin.php" class="button special">Sign In</a></li>
						<li><a href="logout.php" class="button special">Log Out</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="baner">
				<h2>Welocome To Pocket Metro card</h2>
				<p>Welcome : <?
								echo $_SESSION['fname'];
								echo ',';
								$_SESSION['lname'];
							 ?>
				<br> </p></p>
				<ul class="actions">
					 
				</ul>
			</section>

		<!-- One -->
		<div>
                                 


			 
					<header class="major"><br>
						<h3>Please complete the form to Purchase your Metro card</h3> 
				</div>
				
				<div class="container 50%">
					<form action="buynewcard.php" id="newcardform" method="post">
						<div class="row uniform">
							<div class="6u 12u$(small)">
                                <label> Choose card type</label>
								<input name="card" id="name" value=""  type="radio"> Regular
								<input name ="amount"type="text" id="amount"placeholder="Amount"> <br>
								 
								<input name="card" id="name" value=""  type="radio"> 7 day Unlimited <br>
								<input name="card" id="name" value=""  type="radio"> 30 day Unlimited<br>
							</div>
							<div>
							<label> Payment</label>
								<input class="payment" name ="cardnumber"type="text" id="payment"placeholder="Card Number"> <br>
								<input class="payment" name ="expdate"type="text" id="payment"placeholder="Exp Date"> <br>
								<input class="payment" name ="securitycode"type="text" id="payment"placeholder="Security code"> <br>

								
							</div>
							<div>
								<input type="checkbox" name="saveinfo" id="payment"value="" checked="checked">Save my info
							</div>
							 
							<div class="12u$">
								<ul class="actions">
									<li><input value="Submit" class="special big" type="submit"></li>
								</ul>

	
							</div>
						</div>
					</form>
				</div>
			


		<!-- Two -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					 
					 
				</div>
			</section>

		 

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
				
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved.</li>
								<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
								<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
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