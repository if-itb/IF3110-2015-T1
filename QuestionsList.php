<?php
// Nama			: Ryan Yonata
// NIM			: 13513074
// Nama file 	: QuestionList.php
// Keterangan	: Berisi kode php untuk mendpatkan dan menampilkan list pertanyaan

	include('ConnectDatabase.php');

	$sql = "SELECT * FROM Questions ORDER BY Date_Created DESC";
	$result = mysqli_query($conn, $sql);

	include('stringProcessing.php');

	while($row = mysqli_fetch_assoc($result)) 
    {
    echo "<div class='questioncontainer'>";
        echo "<div class='vote'>".
					"<a class='vote-count'>".$row["Vote"]."</a>".
					"			<br>".
					"<a class='vote-tag'> Vote </a>".
			 "</div>";

		$sql_answercount = "SELECT count(*) AS SUM FROM Answers WHERE Question_ID = '$row[ID]' ";
		$answercount = mysqli_query($conn, $sql_answercount);
		$row_answercount = mysqli_fetch_array($answercount);
		$stringShow = cutString($row["Content"]);
		echo "<div class='answer'>".
					"<a class='answer-count'>".$row_answercount["SUM"]."</a>".
					"			<br>".
					"<a class='answer-tag'>Answer</a>".
			 "</div>";

		echo "<div class='question'>".
						"			<a href='Answers.php?id=$row[ID]' class='question-topic'> $row[Topic] </br>".
						"			</a>".
						"			<span class='question-content'>".$stringShow." </span>".
			 "</div>";	

		echo "<div class='modif-question'>".
		 		"asked by <a class='Name'>$row[Name]</a> | ".
		 		"<a href='askform.php?id=$row[ID]' id='edit'> edit </a> | ".
		 		"<a href='delete.php?id=$row[ID]' onclick=\"return confirm('Are you sure you want to delete this question?')\" id='delete_link'>delete</a>".
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