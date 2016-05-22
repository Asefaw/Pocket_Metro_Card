<?php
$mysql_host = "mysql2.000webhost.com";
$mysql_database = "a1409470_mta";
$mysql_user = "a1409470_fatima";
$mysql_password = "fatima123";


$db = mysql_connect("$mysql_host", "$mysql_user", "$mysql_password")or die("cannot connect server "); 
mysql_select_db("$mysql_database")or die("cannot select Database");
?>