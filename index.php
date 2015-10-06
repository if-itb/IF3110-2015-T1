<!DOCTYPE html>
<html>
<title>
	Simple Stack Exchange
</title>
<head>
  <link rel="stylesheet" href="style.css">
  <base href="http://localhost/WBD/index.php?id=" target="_blank">
</head>
<body>
	<h1>Simple StackExchange</h1>
	<div>
		<span>
			<input type="text" class="search"></input>
		</span>
		<span>
			<button type="submit" class="buttonsearch"form="form1" value="Submit">Search</button>
		</span>
	</div>
	<h3>
		Cannot find what you are looking for? 
		<a href="question.php" class="ask">Ask here</a>
	</h3>
	<h2>Recently Asked Questions</h2>
	<hr>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stackexchange";
		// Only process the form if $_POST isn't empty
		if ( ! empty( $_POST ) ) {
	 		$user = $_POST['user'];
	 		$email = $_POST['email'];
	 		$topic = $_POST['topic'];
	 		$content = $_POST['content'];

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			$sql = "INSERT INTO question (username, email, content, topic, num_vote)
			VALUES ('{$conn->real_escape_string($_POST['user'])}','{$conn->real_escape_string($_POST['email'])}','{$conn->real_escape_string($_POST['content'])}','{$conn->real_escape_string($_POST['topic'])}', 0)";

			$_POST['user'] == "";
			$_POST['email'] == "";
			$_POST['topic'] == "";
			$_POST['content'] == "";
			$conn->close();
		}

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		
		if(isset($_GET['id'])) {
			$sql = 'DELETE FROM question WHERE `id_question` =  '.intval($_GET['id']);
		}

		if ($conn->query($sql) === TRUE) {
		    //echo "Record deleted successfully";
		} else {
		    //echo "Error deleting record: " . $conn->error;
		}


		$sql = "SELECT username, num_vote, content, topic, id_question FROM question";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	echo "<table>";
		    	echo "<tr>";
	    		echo '<td class="vote">'. $row["num_vote"].'</td>';
	    		echo '<td class="vote">0</td>';
	    		echo '<td class="topic"><a href="answer.php?id='.$row["id_question"].'" class="topic">'. $row["topic"].'</a></td>';
	    		echo '<td class="askedby"></td>';
	  			echo "</tr>";
	  			echo "<tr>";
	    		echo '<td class="vote1">Votes</td>';
	    		echo '<td class="vote1">Answers</td>';
	    		echo '<td class="topic"></td>';
	    		echo '<td class="askedby">asked by '; 
	    		echo '<span class="user">'. $row["username"].' </span>|';
	    		echo '<span class="edit"> edit </span>|';
	    		echo '<span class="delete"><a href="index.php?id='.$row["id_question"].'" class="delete"> delete </a></span>';
	    		echo '</td>';
	  			echo '</tr>';
		        echo "</table>";
		        echo "<hr>";

		    }

		    
		} else {
		    echo "0 results";
		}

		

		$conn->close();

				
	?>

</body>


</html> 