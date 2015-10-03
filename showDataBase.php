<html>
<body>
<?php
$username="root";
$password="";
$database="arc";

mysql_connect("localhost",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query = "SELECT * FROM webuser";
$result = mysql_query($query);
$num = mysql_numrows($result);
mysql_close();
?>

<table border="0" cellspacing="2" cellpadding="2">
	<tr>
		<td>
			<font face="Arial, Helvetica, sans-serif">Full Name</font>
		</td>
		<td>
			<font face="Arial, Helvetica, sans-serif">User Name</font>
		</td>
		<td>
			<font face="Arial, Helvetica, sans-serif">Email</font>
		</td>
	</tr>
<?php $i=0; while ($i < $num) { 
	$f1=mysql_result($result,$i,"FullName");
	$f2=mysql_result($result,$i,"userName");
	$f3=mysql_result($result,$i,"email");
?>
	<tr>
		<td>
			<font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font>
		</td>
		<td>
			<font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
		</td>
		<td>
			<font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font>
		</td>
	</tr>

<?php $i++;} ?>

<a href ="AdminCV.html">Return</a>
</body>
</html>