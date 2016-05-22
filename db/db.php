<?php
$mysql_host = "mysql.hostinger.co.uk";
$mysql_database = "u521351239_mta";
$mysql_user = "u521351239_root";
$mysql_password = "MetroCard";





try {
    $conn = new PDO("mysql:host=$mysql_host;dbname=u521351239_mta", $mysql_user, $mysql_password);
   
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>