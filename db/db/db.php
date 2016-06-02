<?php
$mysql_host = " ";
$mysql_database = "";
$mysql_user = " ";
$mysql_password = " ";


$db = mysql_connect("$mysql_host", "$mysql_user", "$mysql_password")or die("cannot connect server "); 
mysql_select_db("$mysql_database")or die("cannot select Database");
?>
