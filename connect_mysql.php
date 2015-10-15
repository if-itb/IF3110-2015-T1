<html>

<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "simplestackexchange";
	$con = mysql_connect($host, $username, $password) or die("Connnetion Unsuccessfull".mysql_error());

	mysql_select_db($dbname, $con) or die("Database not found".mysql_error());
?>

</html>