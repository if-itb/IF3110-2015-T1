<?php 
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stack_exchange";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn)
	{
    	die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM question ORDER BY Date DESC";
	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)) {
		echo "<div class='qcontainer'>";
			echo "<div class='vote'>".
					"<div id='vote-count'>$row[Vote]</div>".
					"<div> Vote </div>".
				 "</div>";
			echo "<div class='answer'>".
					"<div id='answer-count'>0</div>".
					"<div> Answer </div>".
				 "</div>";
			echo "<div class='question'>".
					"<div id='question-topic'><a href='answer.php?id=$row[ID]'>$row[Topic]</a></div>".
					"<div id='question-content'>$row[Content]</div>".
				 "</div>";	
			echo '<div class="question-info">'.
			 		"asked by <span id='qname'>$row[Name]</span> | ".
			 		"<a href='#' id='edit'> edit </a> | ".
			 		"<a href='#' onclick=\"return confirm('Are you sure you want to delete this question?')\" id='delete'>delete</a>".
			 	 "</div>";
		echo "</div>";
		echo "<div id='qline'><hr></div>";
    }
?>