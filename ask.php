<!DOCTYPE html>
<html>
	<head>
		<title>StackExchange</title>
		<link rel="stylesheet" type="text/css" href="./css/main.css">
	</head>
	<body>
	<?php
		if(!empty($_GET['id'])){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "dbmy";
			
			$id = $_GET['id'];
			$withanswer = $_GET['withanswer'];
				
			// create connection
			$conn = mysqli_connect($servername,$username,$password,$dbname);
			// check connection
			if(!$conn){
				die("Connection failed: " .mysqli_connect_error());
			}
			$sql = "SELECT * FROM question where No=$id";
			$pertanyaan = mysqli_query($conn,$sql);			
			$row = mysqli_fetch_assoc($pertanyaan);
		
	?>
		<a href="showquestion.php"><h1 id="header">Simple StackExchange</h1></a>
		<div class="next">	
			<h2 class="subtitle">What's your question?</h2>
			<form action="question.php?id=<?php echo $id;?>&withanswer=<?php echo $withanswer?>" onsubmit="return validasiForm(this);" method="POST">
				<div class="coba">
					<input type="text" name="nama" placeholder="Name" <?php echo "value='".$row['name']."'";?> >
					<input type="text" name="email" placeholder="Email" <?php echo "value='".$row['email']."'";?>>
					<input type="text" name="topikpertanyaan" placeholder="Question Topic" <?php echo "value='".$row['topik']."'";?>>
					<textarea name="pertanyaan" placeholder="Content" rows="10" cols="10" ><?php echo $row['konten'];?></textarea>
				</div>
				<input type="submit" value="Post" class="bawah">
			</form>
		</div>
	<?php  
		mysqli_close($conn); 
		} else {
	?>
		<a href="showquestion.php"><h1 id="header">Simple StackExchange</h1></a>
		<div class="next">	
			<h2 class="subtitle">What's your question?</h2>
			<form action="question.php" onsubmit="return validasiForm(this);" method="POST">
				<div class="coba">
					<input type="text" name="nama" placeholder="Name" >
					<input type="text" name="email" placeholder="Email" >
					<input type="text" name="topikpertanyaan" placeholder="Question Topic" >
					<textarea name="pertanyaan" placeholder="Content" rows="10" cols="10"></textarea>
				</div>
				<input type="submit" value="Post" class="bawah">
			</form>
		</div>
		<?php } ?>
		<script src="js/function.js"></script>
	</body>
</html>