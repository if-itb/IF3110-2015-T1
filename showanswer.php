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
			
			$id = $_GET['id'];
			
			$sql_pertanyaan = "SELECT * FROM question WHERE No=$id";
			$pertanyaan = mysqli_query($conn,$sql_pertanyaan);
			$row_pertanyaan = mysqli_fetch_assoc($pertanyaan);
			
			$sql_jawaban = "SELECT * FROM answer WHERE no_pertanyaan=$id";
			$jawaban = mysqli_query($conn,$sql_jawaban);
		?>
		<a href="showquestion.php"><h1 id="header">Simple StackExchange</h1></a>
		<div class="next">
			<h2 class="subtitle"><?php echo $row_pertanyaan["topik"]; ?></h2>
			<div class="container-pertanyaan-jawaban">
				<div class="rate">
					<div onclick="vote(<?php echo $row_pertanyaan['No']; ?>,'pertanyaan','atas',0);">&#x25B2</div> <div id="vote-pertanyaan"><?php echo $row_pertanyaan["vote"]; ?></div> <div onclick="vote(<?php echo $row_pertanyaan["No"]; ?>,'pertanyaan','bawah',0)">&#x25BC</div>
				</div>
				<div class="konten">
					<?php echo $row_pertanyaan["konten"]; ?>
					<p class="info-pertanyaan-jawaban"><br>asked by <?php echo $row_pertanyaan["email"]; ?> at <?php echo $row_pertanyaan["date"]; ?> | <a href="ask.php?id=<?php echo $id?>&withanswer=true">edit</a> | <a href="question.php?id=<?php echo $id?>&delete=true" onclick="return validasiDelete();">delete</a></p>
				</div>
			</div>
			<h2 class="subtitle"><?php echo mysqli_num_rows($jawaban); ?> Answer</h2>
			<?php while($row_jawaban = mysqli_fetch_assoc($jawaban)) { ?>
			<div class="container-pertanyaan-jawaban">
				<div class="rate">
					<div onclick="vote(<?php echo $row_jawaban["no_pertanyaan"]; ?>,'jawaban','atas',<?php echo $row_jawaban["no_jawaban"]; ?>)">&#x25B2</div> <div id="vote-jawaban-<?php echo $row_jawaban['no_jawaban']; ?>"><?php echo $row_jawaban["vote"]; ?></div> <div onclick="vote(<?php echo $row_jawaban["no_pertanyaan"]; ?>,'jawaban','bawah',<?php echo $row_jawaban["no_jawaban"]; ?>)">&#x25BC</div>
				</div>
				<div class="konten">
					<?php echo $row_jawaban["konten"]; ?>
					<p class="info-pertanyaan-jawaban"><br>answered by <?php echo $row_jawaban["email"]; ?> at <?php echo $row_jawaban["date"]; ?></p>
				</div>
			</div>
			<?php } ?>
			<div class="subtitle"></div>
			<div class="judulanswer">Your Answer</div>
			<form action="answer.php?id=<?php echo $id; ?>" method="POST">
				<div class="coba">
					<input type="text" name="nama" placeholder="Name">
					<input type="text" name="email" placeholder="Email">
					<textarea name="jawaban" placeholder="Content" rows="10" cols="10"></textarea>
				</div>
				<input type="submit" value="Post" class="bawah">
			</form>
		</div>
		<?php mysqli_close($conn);?>
		<script src="js/function.js"></script>
	</body>
</html>