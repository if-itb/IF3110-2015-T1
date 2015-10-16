<?php 
	
	/* Nama file 	: list_question.php */
	/* Nama/NIM		: Ahmad Darmawan (13513096) */
	/* Deskripsi	: File ini berfungsi untuk mengambil semua pertanyaan dari database dan menampilkan ke halaman utama. */

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

			$sql_answercount = "SELECT count(*) AS SUM FROM answer WHERE Que_ID = '$row[ID]' ";
			$answercount = mysqli_query($conn, $sql_answercount);
			$row_answercount = mysqli_fetch_array($answercount);

			echo "<div class='answer'>".
					"<div id='answer-count'>".$row_answercount["SUM"]."</div>".
					"<div> Answer </div>".
				 "</div>";

			if (strlen($row["Content"]) > 500) {
				$content = substr(strip_tags($row["Content"]), 0, 500) . '[...]';
			} else {
				$content = $row["Content"];
			}

			echo "<div class='question'>".
					"<div id='question-topic'><a href='answer.php?id=$row[ID]'>$row[Topic]</a></div>".
					"<div id='question-content'>".$content."</div>".
				 "</div>";	
			echo '<div class="question-info">'.
			 		"asked by <span id='qname'>$row[Name]</span> | ".
			 		"<a href='question.php?id=$row[ID]' id='edit'> edit </a> | ".
			 		"<a href='delete.php?id=$row[ID]' onclick=\"return confirm('Are you sure you want to delete this question?')\" id='delete'>delete</a>".
			 	 "</div>";
		echo "</div>";
		echo "<div id='qline'><hr></div>";
    }
?>