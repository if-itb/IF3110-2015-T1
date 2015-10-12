<!DOCTYPE html>
<html>
<head>
	<title>Answer</title>
	<link rel="stylesheet" href="answer.css">
</head>
<body>
	<h1> Simple StackExchange</h1>
	<br><br>
	<h2>The Questions Topic Goes Here</h2>
	<hr>

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "wbd";
		$id = $_GET["ID"];

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT Nama, Topik, Konten, Vote, Jmlh_Jawaban, Tanggal FROM pertanyaan WHERE ID = '$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		$sql2 = "SELECT Nama, EMail, Konten, Vote, Tanggal FROM jawaban WHERE Pertanyaan_ID = '$id'";
		$result2 = mysqli_query($conn, $sql2);
	?>

	<div class="question">
		<div class="question-vote">
			<div class="question-vote-up">
				<p>&#9650;</p>
			</div>
			<div class="question-vote-number">
				<p><?php echo $row["Vote"] ?></p>
			</div>
			<div class="-question-vote-down">
				<p>&#9660;</p>
			</div>
		</div>
		<div class="question-content">
			<?php echo $row["Konten"];?>
		</div>
		<br>
		<div class="question-identity">
			<p> asked by <?php echo $row["Nama"] ?> at <?php echo $row["Tanggal"] ?>  | 
				<span class="edit">  <a href="ask.php?ID=<?php echo $id ?>">edit</a> </span> | 
				<span class="delete"> <a href="delete.php?ID=<?php echo $id ?>">delete</a> </span> 
			</p>
		</div>
	</div>
	<h2 class="count-answer"> <?php echo $row["Jmlh_Jawaban"] ?> Answer</h2>


	<?php
		if (mysqli_num_rows($result) > 0) {
			while($row2 = mysqli_fetch_assoc($result2)){
			?>
			<div class="answer">
				<hr>
				<div class="answer-vote">
					<div class="answer-vote-up">
						<p>&#9650;</p>
					</div>
					<div class="answer-vote-number">
						<p><?php echo $row2["Vote"] ?></p>
					</div>
					<div class="answer-vote-down">
						<p>&#9660;</p>
					</div>
				</div>
				<div class="answer-content">
					<?php echo $row2["Konten"];?>
				</div>
				<br>
				<div class="answer-identity">
					<p> answered by <?php echo $row2["Nama"] ?> at <?php echo $row2["Tanggal"] ?></p>
				</div>
			</div>
			<?php
			}
		}
		else {
			echo "Tidak Ada Pertanyaan Yang Masuk";
		}
	?>
	
	<hr>
	<h2 class="answer-form">Your Answer</h2>
	<div class="answer-form">
		<form action="add_answer.php" method="post">
			<input class="name" type="text" name="nama" value="" placeholder="Name"> <br>
			<input class="email" type="text"  name="email" value="" placeholder="Email"> <br>
			<textarea class="content" type="text" name="konten" placeholder="Content"></textarea><br>
			<input class="question-id" type="hidden" name="q_id" value="<?php echo $id ?>">
			<input class="submit-button" type="submit" value="Post">
		</form>		
	</div>
	
	<?php mysqli_close($conn); ?>

</body>
</html>