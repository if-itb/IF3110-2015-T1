<!DOCTYPE html>
<html>
<title>
	Simple Stack Exchange Question
</title>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<a href="index.php" style="text-decoration:none; color:black"><h1>Simple StackExchange</h1></a>
	<h2>What's your question?</h2>
	<hr>

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
	    while($row = $result->fetch_assoc()) { ?>
	      	<form action="editquestion.php?id=<?php echo $id ?>" method="post">
		    	username : <?php echo $row["username"]; ?><br>
		  		email    : <?php echo $row["email"]; ?><br>
		  		topic    : <?php echo $row["topic"]; ?><br>
		  		<textarea type="text" rows="7" name="content" placeholder="Content" class="content"></textarea>
		  		<br>
				<input type="submit" value="Post" class="post">
			</form>
			<?php $cek = true;
	    }
	} else {
	    echo "0 results";
	}

	if (!empty($_POST)) {
		$content = $_POST['content'];
		if ($content =="") {
			?>
			<script type="text/javascript">
				window.alert("Error : Form incompleted!");
			</script>
			
			<?php
		} else if ($cek == true) {
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
</body>
</html> 