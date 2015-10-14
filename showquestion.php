<!DOCTYPE html>
<html>
	<head>
		<title>StackExchange</title>
		<link rel="stylesheet" href="./css/main.css">
	</head>
	<body>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "dbmy";
			
		// create connection
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		// check connection
		if(!$conn){
			die("Connection failed: " .mysqli_connect_error());
		}
		
		$sql_pertanyaan = "SELECT * FROM question ORDER BY date DESC";
		$pertanyaan = mysqli_query($conn,$sql_pertanyaan);
		?>
		<a class="judul" href="showquestion.php"><h1 id="header">Simple StackExchange</h1></a>
		<div class="next" >
			<div class="search">
				<input type="text" name="cari" class="cari">
				<input type="submit" value="Search" class="tombolcari">
			</div>
			<p class="ask">Cannot find what you are looking for? <a class="ask" href="ask.php">Ask here</a></p>
			<div class="container-judul">
				Recently Asked Questions
				<?php while($row = mysqli_fetch_assoc($pertanyaan)){?>
				
				<div class="container-pertanyaan">
					<div class="vote">
						<?php echo $row["vote"]; ?><br>Votes
					</div>
					<div class="answers">
						<?php 
							$sql_jawaban = "SELECT * FROM answer WHERE no_pertanyaan=".$row["No"];
							$jawaban = mysqli_query($conn,$sql_jawaban);
							echo mysqli_num_rows($jawaban);
						
						?><br>Answers
					</div>
					<div class="questiontopic">
						<div class="topic"><a class="topik" href="showanswer.php?id=<?php echo $row["No"]?>"><?php echo $row["topik"]; ?></a></div>
						<br>
						<?php
							$konten = $row["konten"];
							$konten = strlen($konten)>150 ? (substr($konten, 0 , 150)."...") : ($konten);
							echo $konten;
						?>
					</div>
					<div class="infoask">
						<br>
						asked by <span class="nama"><?php echo $row["name"]; ?></span> | <a class="edit" href="ask.php?id=<?php echo $row["No"];?>&withanswer=false">edit</a> | <a class="delete" href="question.php?id=<?php echo $row["No"];?>&delete=true" onclick="return validasiDelete();">delete</a>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
		<?php mysqli_close($conn);?>
		<script src="js/function.js"></script>
	</body>
</html>