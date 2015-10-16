<!DOCTYPE html>

<html>
	<head>
		<title>Simple StackExchange</title>
		<link href="style.css" rel="stylesheet" type="text/css"></link>
	</head>

	<body>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "database032";	// Nama database

			// Membuat koneksi
			$connection = mysqli_connect($servername, $username, $password, $database);

			// Mengecek koneksi
			if (!$connection) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			// Memasukkan pertanyaan baru ke database 
			if (isset($_POST["questionPostButton"])) {
				$insertQuestionQuery = "insert into questions (questionname, questionemail, questiontopic, questioncontent, questionvotes, questiondatetime)
										values ('".$_POST["questionName"]."', '".$_POST["questionEmail"]."', '".$_POST["questionTopic"]."', '".$_POST["questionContent"]."', 0, now())";
				$insertQuestionResult = mysqli_query($connection, $insertQuestionQuery);
			}

			// Menghapus pertanyaan berdasarkan id nya
			if (isset($_GET["id"])) {
				$deleteQuestionQuery = "delete from questions
										where questionid = ".$_GET["id"];
				$deleteQuestionResult = mysqli_query($connection, $deleteQuestionQuery);	
			}

			// Menampilkan pertanyaan yang memiliki kata kunci dari searchBox
			if (isset($_POST["searchButton"])) {
				$searchQuestionQuery = "select questionid, questionname, questiontopic, questioncontent, questionvotes, questiondatetime
										from questions
										where questiontopic like '%".$_POST["searchBox"]."%'
										or questioncontent like '%".$_POST["searchBox"]."%'";
				$searchQuestionResults = mysqli_query($connection, $searchQuestionQuery);
			}
		?>

		<h1><a href="index.php" style="color:black">Simple StackExchange</a></h1>
		
		<form action="index.php" class="center" method="post" name="searchForm" onsubmit="return validateSearchForm('searchForm', 'searchBox')">
			<input id="searchBox" name="searchBox" type="text"></input>
			<input id="searchButton" name="searchButton" type="submit" value="Search"></input>
		</form>

		<div class="center" style="margin-top:6px">
			Cannot find what you are looking for? <a href="askQuestion.php" style="color:orange"><b>Ask here</b></a>
		</div>

		<?php
			if (isset($_POST["searchButton"])) {
				if (mysqli_num_rows($searchQuestionResults) > 0) {
					echo "<h3>Recently Asked Questions with '".$_POST["searchBox"]."' Keyword</h3>
					<p class='questionBoundary'></p>";
					
					// Menampilkan setiap pertanyaan dari database
					while ($searchQuestionResult = mysqli_fetch_assoc($searchQuestionResults)) {
						// Query untuk memperoleh jawaban-jawaban dari pertanyaan yang memiliki id tertentu
						$answerQuery = "select questionid
										from answers
										where questionid = ".$searchQuestionResult["questionid"];
						$answerResults = mysqli_query($connection, $answerQuery);

						echo "<questionTopic><a href='answerQuestion.php?id=".$searchQuestionResult["questionid"]."' style='color:black'>".$searchQuestionResult["questiontopic"]."</a></questionTopic>

						<p style='margin-top:0px'>
							<votes>".$searchQuestionResult["questionvotes"]." Votes</votes>
							<answers>".mysqli_num_rows($answerResults)." Answers</answers>
							<questionContent>".$searchQuestionResult["questioncontent"]."</questionContent>
						</p>

						<p class='askedBy'>
							asked by <b><span style='color:purple'>".$searchQuestionResult["questionname"]."</span>|<a href='askQuestion.php?id=".$searchQuestionResult["questionid"]."' style='color:orange'>edit</a>|<a href='javascript:confirmDeletion(".$searchQuestionResult["questionid"].")' style='color:red'>delete</a></b>
						</p>";
					}
				}
			} else {
				$query = "	select questionid, questionname, questiontopic, questioncontent, questionvotes, questiondatetime
							from questions
							order by questiondatetime desc";
				$results = mysqli_query($connection, $query);
				
				if (mysqli_num_rows($results) > 0) {	// Database pertanyaan tidak kosong
					echo "<h3>Recently Asked Questions</h3>
					<p class='questionBoundary'></p>";
					
					// Menampilkan setiap pertanyaan dari database
					while ($result = mysqli_fetch_assoc($results)) {
						// Query untuk memperoleh jawaban-jawaban dari pertanyaan yang memiliki id tertentu
						$answerQuery = "select questionid
										from answers
										where questionid = ".$result["questionid"];
						$answerResults = mysqli_query($connection, $answerQuery);

						echo "<questionTopic><a href='answerQuestion.php?id=".$result["questionid"]."' style='color:black'>".$result["questiontopic"]."</a></questionTopic>

						<p style='margin-top:0px'>
							<votes>".$result["questionvotes"]." Votes</votes>
							<answers>".mysqli_num_rows($answerResults)." Answers</answers>
							<questionContent>".$result["questioncontent"]."</questionContent>
						</p>

						<p class='askedBy'>
							asked by <b><span style='color:purple'>".$result["questionname"]."</span>|<a href='askQuestion.php?id=".$result["questionid"]."' style='color:orange'>edit</a>|<a href='javascript:confirmDeletion(".$result["questionid"].")' style='color:red'>delete</a></b>
						</p>";
					}
				}
			}
		?>

		<?php
			mysqli_close($connection);
		?>

		<script src="script.js"></script>
	</body>
</html>