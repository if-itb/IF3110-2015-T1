<!DOCTYPE html>
<!-- Nama		: Ryan Yonata
	 NIM		: 13513074
	 Nama file 	: Search.php
	 Keterangan	: Berisi kode php dan html untuk menampilkan halaman
	 			  hasil pencarian -->

<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>Home</title>
</head>

<body>
	<div class="pageheader">
		<h1>Simple StackExchange</h1>
		<br>
	</div>
	<div class="search">
		<form method="POST" action="Search.php">
			<input id="searchbox" type="text" name="searchQuery" placeholder="Search..."> 
			<input id="submitbutton" type="submit" value="Search"> <br>
		</form>
	</div>
	<br>
	<br>
	<h3>Search Result</h3>
	<div class="linehome"> <hr> </div>

	<?php
		include('ConnectDatabase.php');
		$SearchQuery = htmlspecialchars($_POST["searchQuery"]);
		$sql = "SELECT * FROM Questions WHERE Topic ='%$SearchQuery%' OR Content='%$SearchQuery%'";
		$result = mysqli_query($conn, $sql);

		include('stringProcessing.php');

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
			$stringShow = cutString($row["Content"]);
			echo "<div class='answer'>".
									$row_answercount["SUM"].
						"			<br>".
						"			Answer".
				 "</div>";

			echo "<div class='question'>".
							"			<a href='Answers.php?id=$row[ID]' class='question-topic'> $row[Topic] </br>".
							"			</a>".
							"			<span class='question-content'>".$stringShow." </span>".
				 "</div>";	

			echo "<div class='modif-question'>".
			 		"asked by $row[Name] | ".
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

</html>