<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
 <?php
 	session_start();
 	 
$_SESSION['logged_in'] = true; 
$_SESSION['last_activity'] = time(); 
$_SESSION['expire_time'] = 2;

if( $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) {  
     
    header('Location: logout.php');  
} else{ 
    $_SESSION['last_activity'] = time();  
}
	 
 ?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>User Menu</title>
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
<style type="text/css">
    #header{
            padding:1em;
    }
    #baner {
    background-image: url(images/dark_tint.png), url(images/bokeh_car_lights_bg.jpg);
    background-position: center center;
    background-size: cover;
    color: #ffffff;
    padding: 1em 0em 3em;
     
    }
    #sectionone{
    padding-left: 2em;
    text-align: left;
    }
    main_content{
     
    } 
    #cardoption li{
        list-style:none;
        display: inline-block;
        padding-right: 25px;padding-top: 3px;
        font-size: 12pt;
        font-weight bold;
    }
    #cardoption li:hover{
        background-color: #F4F4F4;
        text-decoration: none;
    }
    #welcome{
       float: right;
       margin: 0 50px 10px 10px;
       font-weight: bold;
       padding- bottom: 40px;
       padding- right: 40px;
       text-align: left;
    }
</style>
	</head>
	<body class="landing">
	 

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html"></a></h1>
				<nav id="nav">
					<ul>
						<li><a href="logout.php" class="button special">Log Out</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="baner">
				<h2>Welcome To Pocket MetroCard</h2>
				<p id="welcome">Welcome : <?
								echo $_SESSION['fname'];
								echo ',';
								echo $_SESSION['lname']; '<br>'; 
							 ?>
				<br> </p></p>
				<ul class="actions">
					 
				</ul>
			</section>

		<!-- One -->
			<section id="sectionone">
				<div class="main_content">
				<div id="metrocards">

                                
				<!--Table to hold customeer information-->
                                <ul id=cardoption>
                                    <li><a href="newCard.php"> Buy A New Card</a></li>
                                    <li><a href="addMoney.php"> Add Money</a></li>
                                    <li><a href="addValue.php"> Add Time</a></li>
                                    <li><a href="ContactUs.php"> Report a Lost Card</a></li>
                                </ul>
                   <?php
			echo "<table style='border: solid 1px black;'>";
			 echo "<tr><th> Metro Card Number</th><th>Balance</th></tr>";

			class TableRows extends RecursiveIteratorIterator { 
			    function __construct($it) { 
			        parent::__construct($it, self::LEAVES_ONLY); 
			    }

			    function current() {
			        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
			    }

			    function beginChildren() { 
			        echo "<tr>"; 
			    } 

			    function endChildren() { 
			        echo "</tr>" . "\n";
			    } 
			} 


			$servername = "mysql.hostinger.co.uk";
			$dbname = "u303516869_db";
			$username= "u303516869_admin";
			$password = "metrocard1";

			try {
			    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $stmt = $conn->prepare("SELECT  t.serieNumber,c.balance FROM Transaction t
                  INNER JOIN metrocard c
                  ON t.serieNumber = c.cardNumber
                  WHERE t.CustomerID = :cid"); 
			    
			    $stmt->bindParam(':cid', $_SESSION['custid'], PDO::PARAM_STR);  
			    $stmt->execute();

			    // set the resulting array to associative
			    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

			    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
			        echo $v;
			    }
			}
			catch(PDOException $e) {
			    echo "Error: " . $e->getMessage();
			}
			$conn = null;
			echo "</table>";
			?> 		              
					
				</div>
				 
				</div>
				
			</section>


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