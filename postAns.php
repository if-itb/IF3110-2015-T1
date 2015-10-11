<?php
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'tubeswbd'); 
define('DB_USER','root'); 
define('DB_content',''); 
$con = mysql_connect(DB_HOST,DB_USER,DB_content) or die("Failed to connect to MySQL: " . mysql_error()); 
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
function SubmitQuestion() { 
	$name = $_POST['name']; 
	$email = $_POST['email']; 
	$topic = $_POST['topic']; 
	$content = $_POST['content'];
	$vote = filter_input(INPUT_POST, '0', FILTER_VALIDATE_INT);
	$timestamp = date('Y-m-d H:i:s');
	//Insert data to question table
	$query = "INSERT INTO question (name,email,topic,content,vote,timeask) VALUES ('$name','$email','$topic','$content','$vote','$timestamp')";
	//Insert data into question table 
	//$queryLogIn = "INSERT INTO email (email,pass) VALUES ('$email', '$content')";
	$data = mysql_query ($query)or die(mysql_error()); 
	//$dataLogIn = mysql_query ($queryLogIn)or die(mysql_error()); 
	if($data) //&& $dataLogIn) 
	{
	 echo "<script type='text/javascript'>alert('We have noted your question. Thank you and hope you get your answer') 
		window.location.href='index.html';</script>";
	} 
} 

function CheckSubmission() { 
	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['topic']) && !empty($_POST['content']) ) 
	//checking the name,email, topic and content which cannot be empty
	{ 
		SubmitQuestion(); 
	} else {
		echo "<script type='text/javascript'>alert('Sorry...There are empty fields... please check that you have filled all the form') 
		window.location.href='postQuestion.html';</script>";
	} 
}

if(isset($_POST['submit'])) { CheckSubmission(); }
?>

<!DOCTYPE>
<html>
<head>
<title>Answer</title>
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

<!-- Print section -->
    <div>
      <?php
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn )
         {
            die('Could not connect: ' . mysql_error());
         }
         
         $sql = 'SELECT name, topic, vote, content FROM question WHERE id=1';
         mysql_select_db('tubeswbd');
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
         {
            echo 
                "<table width = \"100%\">".
                "<th> {$row['topic']} </th> ".
                " <tr> <td> {$row['vote']} </td> ".
                " <td> {$row['content']} </td>".
                " <td> Asked by : {$row['name']} </td></tr>".
                " <tr><td> <form method=\"GET\" target=\"showDataBase.php\">".
                "   <input id=\"submit\" type=\"submit\" name=\"edit\" value=\"edit\" </td>".
                " <td> <form method=\"GET\" target=\"postQuestion.html\">".
                "   <input id=\"submit\" type=\"submit\" name=\"delete\" value=\"delete\" </td>".
                "</tr></table>";
         }
         
         mysql_close($conn);
      ?>
    </div>
<!-- Print section -->    

  </div>
  <div id = "extra">
    <div>There are no stupid question, only curious mind</div>
    <p><i> - Satria Priambada</i></p>
  </div>
</div>
  
</div>
</body>
</html>

