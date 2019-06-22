<?php
$serverName = "localhost";//server name
$userName = "u996590510_info";//username phpmyadmin
$pass = "TeamCFR@2020";//password for database
$dbName = "u996590510_donat";//database
$con = mysqli_connect($serverName,$userName,$pass,$dbName);// to connect db
if(!$con){
	echo "".mysql_error($con);//display error if connetion is not set
}
?>
