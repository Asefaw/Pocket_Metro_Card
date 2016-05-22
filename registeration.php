<?php
$mysql_host = "mysql.hostinger.co.uk";
$mysql_database = "u303516869_db";
$mysql_user = "u303516869_admin";
$mysql_password = "metrocard1";





try {
    $conn = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);
   } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$password = $_POST['password'];
$hashCode = password_hash($password,PASSWORD_DEFAULT);
$datetime=date("y-m-d h:i:s");
$sql = "INSERT INTO customer(email,firstName,lastName,dateOfBirth,gender,address,password,phone,dateCreated)
        VALUES (:email,:firstName,:lastName,:dateOfBirth,:gender,:address,:password,:phone,:dateCreated)";
                                          
$stmt = $conn->prepare($sql);
                                              
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);       
$stmt->bindParam(':firstName', $_POST['firstname'], PDO::PARAM_STR); 
$stmt->bindParam(':lastName', $_POST['lastname'], PDO::PARAM_STR);
// use PARAM_STR although a number  
$stmt->bindParam(':dateOfBirth', $_POST['dateofbirth'], PDO::PARAM_STR); 
$stmt->bindParam(':gender', $_POST['gender'], PDO::PARAM_STR);
$stmt->bindParam('address', $_POST['address'],PDO::PARAM_STR);
$stmt->bindParam(':password', $hashCode, PDO::PARAM_STR);
$stmt->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
$stmt->bindParam(':dateCreated', $datetime, PDO::PARAM_STR);  
                                      
$result = $stmt->execute();

if($result){
$message = "You have Regitered Successfully";
    echo "<script type='text/javascript'>alert('$message');</script>";
header('Location: signin.php');
} 


?>