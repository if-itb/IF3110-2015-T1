<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  	<link rel="stylesheet" href="home.css">
</head>
<body>
	<h1> Simple StackExchange</h1>
	<br><br>

	<form action="answer.php" class ="input" method="post"> 
	<div class="search">
		<input class="search-bar" type="text" name="cari" value="" >
		<input class="submit-button" type="submit" value="Search">
	</div>
	</form>
	<p class="state1"> Cannot find what are you are looking for ?<a href="ask.php?ID=0" > Ask here </a> </p>
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

		$sql = "SELECT ID, Nama, Topik, Vote, Konten, Jmlh_Jawaban FROM pertanyaan";
		$result = mysqli_query($conn, $sql);
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
					<div class="question-topic">
						<a href="answer.php?ID=<?php echo $row["ID"] ?>"><?php echo $row["Topik"]?></a>
					</div>
					<div class="question-content">
						<p><?php echo substr($row["Konten"], 0, 270)?></p>
					</div>
					<div class="question-id">
						<p> asked by <span class="name"><?php echo $row["Nama"] ?></span> | 
							<span class="edit"> <a href="ask.php?ID=<?php echo $row["ID"] ?>"> edit </a> </span> | 
							<span class="delete"> <a href="delete.php?ID=<?php echo $row["ID"] ?>" onclick="return confirm('Apakah anda ingin menghapusnya ?')"> delete </a> </span> 
						</p>
					</div>
				</div>
				<?php
			}
		}else {
			echo "Tidak Ada Pertanyaan Yang Masuk";
		}
		mysqli_close($conn);
	?>
</body>
</html>