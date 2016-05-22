<?php
$mysql_host = "mysql.hostinger.co.uk";
$mysql_database = "u303516869_db";
$mysql_user = "u303516869_admin";
$mysql_password = "metrocard1";
session_start();
 	 $id=$_SESSION['custid'];




try {
    $conn = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);
   } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
//input for insert to mero card
$id = $_SESSION['custid'];
$password = $_POST['password'];
$cardType = $_POST['card'];




switch ($_POST['metrocard']) {
	case 'unlimited7':
		$amount = 31;
		break;
	case 'unlimited30':
			$amount = 120;
			break;
	
	default:
		$amount = $_POST['amount'];
		break;
}
$min = 1000;
$max = 1000000000000000000000;
$suisse_interest = mt_rand ($min*10, $max*10) / 10;

//$exdate = date("d/m/Y", strtotime("+ 365 day"));


//$joindate = date('d/m/Y');
//$exdate   = date('d/m/Y', strtotime('+1 year'));


	
$exdate=date("y-m-d h:i:s");


   $answer = $_POST['card'];  
if ($answer == "Regular") {          
   $bal=$_POST['amount'];      
}
elseif ($answer == "7Unlimited") {
    $bal=31; 
}  
elseif ($answer == "30Unlimited") {
    $bal=116; 
}    
$sql = "INSERT INTO metrocard(cardNumber,type,expirationDate,balance)
        VALUES (:cardNumber,:type,:expirationDate,:balance)";
                                          
$stmt = $conn->prepare($sql);

$stmt->bindParam(':cardNumber', $suisse_interest, PDO::PARAM_STR);       
$stmt->bindParam(':type', $_POST['card'], PDO::PARAM_STR); 
$stmt->bindParam(':expirationDate', $exdate , PDO::PARAM_STR);
$stmt->bindParam(':balance', $bal, PDO::PARAM_STR);                                     
$result = $stmt->execute();



$sqlCredit = "INSERT INTO creditCard(cardNumber,custID,expMonth,expYear)
        	  VALUES (:cardNumber,:custID,:expMonth,:expYear)";

$stmtCredit = $conn->prepare($sqlCredit);
                                              
$stmtCredit->bindParam(':cardNumber', $_POST['cardnumber'], PDO::PARAM_STR);       
$stmtCredit->bindParam(':custID', $_SESSION['custid'], PDO::PARAM_STR); 
$stmtCredit->bindParam(':expMonth', $_POST['expMonth'], PDO::PARAM_STR);
$stmtCredit->bindParam(':expYear', $_POST['expYear'], PDO::PARAM_STR);
$result2 = $stmtCredit->execute();

// $sql2 = "INSERT INTO creditCard(cardNumber,custID,expMonth,expYear)
//         	  VALUES (:cardNumber,:custID,:expMonth,:expYear)";

// $stmt2 = $conn->prepare($sql2);
                                              
// $stmt2->bindParam(':cardNumber',$_POST['cardnumber'], PDO::PARAM_STR);       
// $stmt2->bindParam(':custID', $_SESSION['custid'], PDO::PARAM_STR); 
// $stmt2->bindParam(':expMonth', $_POST['expmonth'], PDO::PARAM_STR);
// $stmt2->bindParam(':expYear', $_POST['expyear'], PDO::PARAM_STR);
// $result2 = $stmt2->execute();



$sql3 = "INSERT INTO Transaction(Amount,Trdate,CustomerID,serieNumber,creditCard)
        VALUES (:amount,:tdate,:CustomerID,:serialNumber,:creditCard)";
                                          
$stmt3 = $conn->prepare($sql3);
 
$datetime = "2016-09-09";                                             
$stmt3->bindParam(':amount', $bal, PDO::PARAM_STR);       
$stmt3->bindParam(':tdate', $datetime, PDO::PARAM_STR); 
$stmt3->bindParam(':CustomerID', $_SESSION['custid'], PDO::PARAM_STR);
$stmt3->bindParam(':serialNumber', $suisse_interest, PDO::PARAM_STR);
$stmt3->bindParam(':creditCard', $_POST['cardnumber'], PDO::PARAM_STR);

// use PARAM_STR although a number  

                                      
$result3 = $stmt3->execute();



if($result AND $result2 AND $result3){
	
	$message = "Thank you for your order.We appreciate your business.Your metro card will be mailed within you 2 days.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  
 header('Refresh: 1; welcomepage.php');
exit;
} 


?>

















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
		<title>Buy a New Card</title>
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
				<h1><a href="index.html"></a></h1>
				<nav id="nav">
					<ul>
						<li><a href="logout.php" class="button special">Log Out</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="baner">
				<h2>Welocome To Pocket MetroCard</h2>
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
		<div>
                                 


			 
					<header class="major"><br>
						<h3>Please complete the form to Purchase your Metro card</h3> 
				</div>
				
				<div class="container 50%">
					<form action="newCard.php" id="newcardform" method="post">
						<div class="row uniform">
							<div class="6u 12u$(small)">
                                <label> Choose card type</label>
								<input name="card" id="name" value="Regular"  type="radio"> Regular
								<input name ="amount"type="text" id="amount"placeholder="Amount"> <br>
								 
								<input name="card" id="name" value="7Unlimited"  type="radio"> 7 day Unlimited <br>
								<input name="card" id="name" value="30Unlimited"  type="radio"> 30 day Unlimited<br>
							</div>
							<div>
							<label> Payment</label>
								<input class="cardnumber" name ="cardnumber"type="text" id="payment"placeholder="Card Number"> <br>
								<select name="expMonth"id="payment">
								  <option selected disabled>Exp Month</option>
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								</select>
								<br>
								<select name="expYear" id="payment">
								  <option selected disabled>Exp Year</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								</select>
								<br>
								
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