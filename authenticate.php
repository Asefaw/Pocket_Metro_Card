<?php
	session_start();
	
	//DB configuration Constants
	define('_HOST_NAME_', 'mysql.hostinger.co.uk');
	define('_USER_NAME_', 'u303516869_admin');
	define('_DB_PASSWORD', 'metrocard1');
	define('_DATABASE_NAME_', 'u303516869_db');
	
	//PDO Database Connection
	try {
		$databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
		$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	
	if(isset($_POST['submit'])){
		$errMsg = '';
		//username and password sent from Form
		$username = trim($_POST['email']);
		$password = trim($_POST['password']); 
		if($username == '')
			$errMsg .= 'You must enter your Username<br>';
		
		if($password == '')
			$errMsg .= 'You must enter your Password<br>';
		
		
		if($errMsg == ''){
			$records = $databaseConnection->prepare('SELECT customerid,firstName,lastName,email,password FROM  customer WHERE email = :email');
			$records->bindParam(':email', $username);
			 
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);
			if(count($results) > 0  ){
				$_SESSION['email'] = $results['email'];
				$_SESSION['custid'] = $results['customerid'];
				$_SESSION['fname'] = $results['firstName'];
				$_SESSION['lname'] = $results['lastName'];
				header('location:welcomepage.php');
				exit;
			}else{
				$_SESSION['message'] = "Your Email or Password is Incorrect..Please try again.";
                                 header("Location: signin.php");
				 
			}
		}
	}

?>