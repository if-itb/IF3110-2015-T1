<!DOCTYPE html>
<html>
<title>
	Simple Stack Exchange Question
</title>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Simple Stack Exchange</h1>
	

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stackexchange";

		$id = intval($_GET['id']);

		if ( ! empty( $_POST ) ) {
	 		$user = $_POST['user'];
	 		$email = $_POST['email'];
	 		$content = $_POST['content'];

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			$sql = "INSERT INTO answer (username, email, content, id_question, num_votes)
			VALUES ('{$conn->real_escape_string($_POST['user'])}','{$conn->real_escape_string($_POST['email'])}','{$conn->real_escape_string($_POST['content'])}','{$conn->real_escape_string($id)}', 0)";

			if ($conn->query($sql) === TRUE) {
			    //echo "New record created successfully";
			    //echo $last_id;
			} else {
			    //echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
		}


		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT username, num_vote, content, topic, question_date FROM question WHERE id_question=" .$id;
		$result = $conn->query($sql);


		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	echo "<h2>". $row["topic"]."</h2>
						<hr>
						<table>";
		    	echo "<tr>";
	    		echo '<td class="total">'. $row["num_vote"].'</td>';
	    		echo '<td class="qacontent">'.$row["content"].'</td>';
	    		echo '</tr>
						<tr></tr>
						<tr>
						<td></td>';
				echo '<td class="askedby">asked by ';
	    		echo '<span class="user">'.$row["username"].' </span>at ';
	    		echo '<span class="time">' .$row["question_date"].' </span>|';
	    		echo '<span class="edit"> edit </span>|';
	    		echo '<span class="delete"> delete </span>
	    			</td>';
	    		echo "</tr></table><br><br><br>";
		        
		    }
		} else {
		    echo "0 results";
		}

		$sql = "SELECT username, num_votes, content, answer_date, num_answer FROM answer WHERE id_question=" .$id;
		$result = $conn->query($sql);

		echo "<h2>Answer</h2><hr><br>";

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	
				echo "<table>";
		    	echo "<tr>";
	    		echo '<td class="total">'. $row["num_votes"].'</td>';
	    		echo '<td class="qacontent">'.$row["content"].'</td>';
	    		echo '</tr>
						<tr></tr>
						<tr>
						<td></td>';
				echo '<td class="askedby">answered by ';
	    		echo '<span class="user">'.$row["username"].' </span>at ';
	    		echo '<span class="time">' .$row["answer_date"].' </span>';
	    		echo '</td>';
	    		echo "</tr></table><hr><br>";   
		    }
		} else {
		    echo '<div class="answerresult">No results</div>';
		    echo "<br><br><br>";
		}

		echo "<br>";
		echo "<h4>Your Answer</h4>";
	
		echo "<hr>";
		echo '<form action= "answer.php?id='.$id.'" method="post">';
		echo  '<input type="text" name="user" placeholder="Name"><br>
		  <input type="text" name="email" placeholder="Email"><br>
		  <textarea type="text" rows="7" name="content" placeholder="Content" class="content"></textarea><br>
		  <input type="submit" value="Post" class="post">
		</form>'; 
		$conn->close();
		
	?>
		
	

	
</body>

</html>