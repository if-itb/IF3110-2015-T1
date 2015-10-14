<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>ANSWER a Question</title>
		<link rel="stylesheet" type="text/css" href="style.css">	
	</head>
	<body>
		<div class='closing'>
		<a href="index.php"><H2>SIMPLE STACK EXCHANGE</H2></a>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sse";
		$qid = $_GET['id'];
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
		    die("Post failed, please resubmit your question.");
		}	
		//SQL Query
		$val = "'".$qid."','".$_POST['name']."','".$_POST['mail']."','".$_POST['acontent']."'";
		
		$sql = "insert into answer (qid, ansname, email, content)
		values (".$val.")";
		
		if (mysqli_query($conn, $sql)) {
		    echo "Your answer has been posted succesfully!<br><br>";		    
		    echo "You will be redirected to main page in 5 sec.<br><br>";
		    echo "<a href='index.php'>Back</a><br><br>";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}	

		
		mysqli_close($conn);
		?>	
		<script>
			function Redirect() {
				window.location="/WBD/index.php";
			}			    		
			setTimeout('Redirect()', 5000);		
		
		</script>
		</div>		
	</body>
</html>
