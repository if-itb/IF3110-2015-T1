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
		
		$sql = "SELECT * FROM question";
		$result = mysqli_query($conn,$sql);
		?>
		<h1 id="header">Simple StackExchange</h1>
		<div class="next" >
			<div class="search">
				<input type="text" name="cari" class="cari">
				<input type="submit" value="Search" class="tombolcari">
			</div>
			<p class="ask">Cannot find what you are looking for? <a href="ask.php">Ask here</a></p>
			<div class="container-judul">
				Recently Asked Questions
				<?php while($row = mysqli_fetch_assoc($result)){?>
				
				<div class="container-pertanyaan">
					<div class="vote">
						<?php echo $row["vote"]; ?><br>Votes
					</div>
					<div class="answers">
						<?php echo $row["answer"]; ?><br>Answers
					</div>
					<div class="questiontopic">
						<?php echo $row["topik"]; ?>
					</div>
					<div class="infoask">
						<br>
						asked by <?php echo $row["name"]; ?> | edit | delete
					</div>
				</div>
				<?php }?>
			</div>
		</div>
		<?php mysqli_close($conn);?>
	</body>
</html>