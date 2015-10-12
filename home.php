<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  	<link rel="stylesheet" href="home.css">
</head>
<body>
	<h1> Simple StackExchange</h1>
	<br><br>

	<form action="answer.php" class ="input" method="get"> 
	<div class="search">
		<input class="search-bar" type="text" name="cari" value="" >
		<input class="submit-button" type="submit" value="Submit">
	</div>
	</form>
	<p class="state1"> Cannot find what are you are looking for ?<a href="ask.php" > Ask here </a> </p>
	<br>
	<p class="state2"> Recently Asked Questions</p>

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "wbd";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT ID, Nama, Email, Topik, Konten, Vote, Jmlh_Jawaban FROM pertanyaan";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)){
				?>
				<div class="question">
					<hr>
					<div class="vote">
						<span><?php echo $row["Vote"] ?></span><br>
						<span>Vote</span>
					</div>
					<div class="answer-number">
						<span><?php echo $row["Jmlh_Jawaban"] ?></span><br>
						<span>Answer</span>
					</div>
					<div class="topic-question">
						<?php echo $row["Topik"]?>
					</div>
					<div class="id-question">
						<p> asked by <span class="name"><?php echo $row["Nama"] ?></span> | <span class="edit"> <a href="ask.php"> edit </a> </span> | <span class="delete"> <a href="ask.php"> delete </a> </span> </p>
					</div>
				</div>
				<?php
			}
		}
		else {
			echo "Tidak Ada Pertanyaan Yang Masuk";
		}
		mysqli_close($conn);

	?>

</body>
</html>