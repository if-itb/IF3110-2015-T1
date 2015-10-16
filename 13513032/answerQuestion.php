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

			// Mengambil data pertanyaan dari database, berdasarkan id nya
			$questionQuery = "	select questionemail, questiontopic, questioncontent, questionvotes, questiondatetime
								from questions
								where questionid = ".$_GET["id"];
			$questionResults = mysqli_query($connection, $questionQuery);
			$questionResult = mysqli_fetch_assoc($questionResults);

			// Mengambil data jawaban-jawaban dari database, berdasarkan id pertanyaannya
			$answerQuery = "select answeremail, answercontent, answervotes, answerdatetime
							from answers
							where questionid = ".$_GET["id"];
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
			asked by <?php echo $questionResult["questionemail"] ?> at <?php echo $questionResult["questiondatetime"] ?>|<b><a <?php echo "href='askQuestion.php?id=".$_GET["id"]."'" ?> style="color:orange">edit</a>|<span style="color:red">delete</span></b>
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

		<form style="margin-top:-7px">
			<input class="askQuestionData" placeholder="Name" type="text"></input>
			<input class="askQuestionData" placeholder="Email" type="text"></input>
			<textarea placeholder="Content" rows="9"></textarea>
			<input id="postButton" type="button" value="Post"></input>
		</form>
	</body>
</html>