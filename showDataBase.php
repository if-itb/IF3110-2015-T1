<html>
<head>
	<title>Ask Question</title>
	<meta charset ="utf-8">
	<link rel = "stylesheet" type = "text/css" href = "styles.css" />
</head>
<body>
	<div id = "header">
		<h1>SIMPLE STACK EXCHANGE</h1>
	</div>
	
<div align ="center">
	<h1>What is your Question?</h1>
	<fieldset style="width:60%" ><legend>Question Form</legend> 
<?php
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'tucilwbd'); 
define('DB_USER','root'); 
define('DB_content',''); 


function getQuestion($idquestion){
	$con = mysql_connect(DB_HOST,DB_USER,DB_content) or die("Failed to connect to MySQL: " . mysql_error()); 
	$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
	if(! $con )
	{
	die('Could not connect: ' . mysql_error());
	}

	$sql = "SELECT name, email,topic,content FROM question WHERE id='$idquestion' ";
	mysql_select_db('tucilwbd');
	$retval = mysql_query( $sql, $con );

	if(! $retval )
	{
	die('Could not get data: ' . mysql_error());
	}

	$row = mysql_fetch_array($retval, MYSQL_ASSOC);
	echo "<form method=\"POST\" action=\"editQuestion.php\">
			<input type=\"hidden\" name=\"qID\" value=\"$idquestion\">
			<table border= \"0\" align = \"left\" width=\"100%\"> 
			<tr> 
				<td> <input type=\"text\" name=\"name\" value=\"{$row['name']}\" style=\"width:90%\"></td> 
			</tr> 
			<tr>  
				<td><input type=\"text\" name=\"email\" value=\"{$row['email']}\" style=\"width:90%\"></td> 
			</tr> 
			<tr> 
				<td><input type=\"text\" name=\"topic\" value=\"{$row['topic']}\" style=\"width:90%\"></td>
			</tr> 
			<tr>  
				<td>
					<textarea name=\"content\" value=\"{$row['content']}\" rows=\"5\" cols=\"30\" style=\"width:90%;font-size:20px\"></textarea>
				</td> 
			</tr> 
			<tr> 
				<td align =\"right\"><input id=\"button\" type=\"submit\" name=\"submit\" value=\"Post\" style=\"width:10%\"></td> 
			</tr> 
		</table> 
		</form>"; 


	mysql_close($con);
}
if(isset($_GET['id'])) { getQuestion($_GET['id']); }
?>
	</fieldset>
</div>

</body>	
</html>