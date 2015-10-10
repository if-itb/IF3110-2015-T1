<!DOCTYPE html>
<html>
<title>
	Simple Stack Exchange Question
</title>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Simple StackExchange</h1>
	<h2>What's your question?</h2>
	<hr>
	
	  	 

</body>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stackexchange";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$id = intval($_GET['id']);
	

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT username, email, topic FROM question WHERE id_question=" .$id;
	$result = $conn->query($sql);
	$cek = false;

	if (($result->num_rows > 0)&&!$cek) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	echo '<form action="editquestion.php?id='.$id.'" method="post">';
	    	echo 'username : ' .$row["username"].'<br>';
	  		echo 'email    : ' .$row["email"].'<br>';
	  		echo 'topic    : '.$row["topic"].'<br>';
	  		echo '<textarea type="text" rows="7" name="content" placeholder="Content" class="content"></textarea><br>';
			echo '<input type="submit" value="Post" class="post"></form>';
			$cek = true;
	    }
	} else {
	    echo "0 results";
	}

	if (!empty($_POST) ) {
		$content = $_POST['content'];
		if ($cek == true) {
			$sql = 'UPDATE question SET content="'. $content.'" WHERE id_question='. $id;
			if ($conn->query($sql) === TRUE) {
			    echo "Record updated successfully";
			    
				header("Location: index.php");
				exit;
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			$cek = false;
		}

	}

	

?>

</html> 