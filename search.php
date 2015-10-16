<!DOCTYPE>
<html>
<head>
<title>Stack Exchange</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" src="startpagescript.js"></script>
</head>
<body>
<div id="container">
<div id="header"><h1>SIMPLE STACK EXCHANGE</h1></div>
<div id="wrapper">
  <div id = "navigation">
    <p><strong>Navigation</strong></p>
      <ul>
        <li><a href="http://satriapriambada.blogspot.com">Kunjungi Blog Tio</a></li>
        <li><a href="http://satriapriambada.blogspot.com">I'm feeling Lucky</a></li>
      </ul>
  </div>
  <div id = "content">
    <center>
      <form action="search.php" method="GET">
        <input type ="textbox" id="searchbox" name="search">
        <button type="submit">Search</button> 
      </form>
      <h2>Have Question? <a href="postQuestion.html">Ask Here</a></h2>
    </center>
    <div>
      <table width = "100%" frame = "below">
<?php
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'tucilwbd'); 
define('DB_USER','root'); 
define('DB_content',''); 
$con = mysql_connect(DB_HOST,DB_USER,DB_content) or die("Failed to connect to MySQL: " . mysql_error()); 
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
$search = $_GET['search'];

	//Search data from question table
	 $query = "SELECT id,name,num_ans,name,content,topic,vote FROM question WHERE content LIKE '".$search."' OR topic LIKE '".$search."'";

	 mysql_select_db('tucilwbd');
	 $retval = mysql_query( $query, $con );
	 
	 if(! $retval )
	 {
	    die('Could not get data: ' . mysql_error());
	 }
	 
	 while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	 {
	    echo 
	        "<thead><th colspan =\"5\"> <a href=\"showQA.php?id={$row['id']}\"> {$row['topic']} </a></th></thead> ".
	        " <tr> <td> Vote : {$row['vote']} </td> ".
	        " <td> Answer : {$row['num_ans']} </td>".
	        " <td> Asked by : {$row['name']} </td>".
	        " <td> ".
	        "   <a href=\"showDataBase.php?id={$row['id']}\" > edit</a> </td>".
	        " <td> <a href=\"Delete.php?id={$row['id']}\">delete</a></td>".
	        "</tr>";
	 }


?>

	</table>
    </div>
</div>
  <div id = "extra">
    <div>There are no stupid question, only curious mind</div>
    <p><i> - Satria Priambada</i></p>
  </div>
</div>
  
</div>
</body>
</html>
