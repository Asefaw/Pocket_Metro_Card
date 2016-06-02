<?php
$mysql_host = "";
$mysql_database = "";
$mysql_user = "";
$mysql_password = "";





try {
    $conn = new PDO("mysql:host=$mysql_host;mysql_host", $mysql_user, $mysql_password);
   
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
