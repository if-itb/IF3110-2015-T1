<!DOCTYPE html>

<html>
	<head>
		<title>Your Answer - Simple StackExchange</title>
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

			// Mengubah data pertanyaan id tertentu pada database
			if (isset($_POST["questionPostButton"])) {
				$editQuestionQuery = "	update questions
										set questionname = '".$_POST["questionName"]."', questionemail = '".$_POST["questionEmail"]."', questiontopic = '".$_POST["questionTopic"]."', questioncontent = '".$_POST["questionContent"]."', questiondatetime = questiondatetime
										where questionid = ".$_GET["id"];
				$editQuestionResult = mysqli_query($connection, $editQuestionQuery);
			}

			// Memasukkan jawaban pertanyaan ke database
			if (isset($_POST["answerPostButton"])) {
				$insertAnswerQuery = "	insert into answers (questionid, answername, answeremail, answercontent, answervotes, answerdatetime)
										values (".$_GET["id"].", '".$_POST["answerName"]."', '".$_POST["answerEmail"]."', '".$_POST["answerContent"]."', 0, now())";
				$insertAnswerResult = mysqli_query($connection, $insertAnswerQuery);
			}

			// Mengambil data pertanyaan dari database, berdasarkan id nya
			$questionQuery = "	select questionid, questionemail, questiontopic, questioncontent, questionvotes, questiondatetime
								from questions
								where questionid = ".$_GET["id"];
			$questionResults = mysqli_query($connection, $questionQuery);
			$questionResult = mysqli_fetch_assoc($questionResults);

			// Mengambil data jawaban-jawaban dari database, berdasarkan id pertanyaannya
			$answerQuery = "select answeremail, answercontent, answervotes, answerdatetime
							from answers
							where questionid = ".$_GET["id"]."
							order by answerdatetime desc";
			$answerResults = mysqli_query($connection, $answerQuery);
		?>

		<h1><a href="index.php" style="color:black">Simple StackExchange</a></h1>
		<h2><?php echo $questionResult["questiontopic"] ?></h2>
		<p class="questionBoundary"></p>

		<p style="margin-top:0px">
			<voteupdown>&#9650 <?php echo $questionResult["questionvotes"] ?> &#9660</voteupdown>
			<content><?php echo $questionResult["questioncontent"] ?></content>
		</p>

		<p class="askedAnsweredBy">
			asked by <?php echo $questionResult["questionemail"] ?> at <?php echo $questionResult["questiondatetime"] ?>|<b><a <?php echo "href='askQuestion.php?id=".$_GET["id"]."'" ?> style="color:orange">edit</a>|<a <?php echo "href='javascript:confirmDeletion(".$questionResult["questionid"].")'" ?> style='color:red'>delete</a></b>
		</p>

		<h2><?php echo mysqli_num_rows($answerResults) ?> Answer</h2>

		<?php
			while ($answerResult = mysqli_fetch_assoc($answerResults)) {
				echo "<p class='questionBoundary'></p>
				<p style='margin-top:0px'>
					<voteupdown>&#9650 ".$answerResult["answervotes"]." &#9660</voteupdown>
					<content>".$answerResult["answercontent"]."</content>
				</p>

				<p class='askedAnsweredBy'>answered by ".$answerResult["answeremail"]." at ".$answerResult["answerdatetime"]."</p>
				<p style='margin-top:60px'></p>";
			}
		?>
		
		<p class="questionBoundary"></p>
		<h2 style="margin-top:15px"><span style="color:grey">Your Answer</span></h2>

		<form <?php echo "action='answerQuestion.php?id=".$questionResult["questionid"]."'" ?> method="post" style="margin-top:-7px">
			<input class="askQuestionData" name="answerName" placeholder="Name" type="text"></input>
			<input class="askQuestionData" name="answerEmail" placeholder="Email" type="text"></input>
			<textarea name="answerContent" placeholder="Content" rows="9"></textarea>
			<input id="postButton" name="answerPostButton" type="submit" value="Post"></input>
		</form>

		<?php
			mysqli_close($connection);
		?>

		<script src="script.js"></script>
	</body>
</html>