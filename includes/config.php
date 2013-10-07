<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "reservation";
	
	$con = mysql_connect($host,$user,$password) or die(mysql_error());
	mysql_select_db($db);
?>