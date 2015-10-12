<?php
	include('ConnectDatabase.php');

	$sql = "SELECT * FROM Questions ORDER BY Date_Created DESC";
	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)) 
    {
    echo "<div class='questioncontainer'>";
        echo "<div class='vote'>".
								$row["Vote"].
					"			<br>".
					"			Vote".
			 "</div>";

		$sql_answercount = "SELECT count(*) AS SUM FROM Answers WHERE Question_ID = '$row[ID]' ";
		$answercount = mysqli_query($conn, $sql_answercount);
		$row_answercount = mysqli_fetch_array($answercount);

		echo "<div class='answer'>".
								$row_answercount["SUM"].
					"			<br>".
					"			Answer".
			 "</div>";

		echo "<div class='question'>".
						"			<a href='Answers.php?id=$row[ID]' class='question-topic'> $row[Topic] </br>".
						"			</a>".
						"			<span class='question-content'> $row[Content] </span>".
			 "</div>";	

		echo "<div class='modif-question'>".
		 		"asked by $row[Name] | ".
		 		"<a href='askform.php?id=$row[ID]' id='edit'> edit </a> | ".
		 		"<a href='delete.php?id=$row[ID]' onclick=\"return confirm('Are you sure you want to delete this item?')\" id='delete_link'>delete</a>".
		 	 "</div>";
		echo "<br>";
		echo "<br>";
		//echo "<br>";
		echo "<div class='linequestion'>".
			 "	<hr>".
			 "</div>";
	echo "</div>";
    }

	mysqli_close($conn);
?> 