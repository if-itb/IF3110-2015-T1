<html>
<head>
<?php
	include('add_answer.php');
	// escape variables for security
	$sql="SELECT * FROM answer WHERE id = '$id' ORDER BY id_answer DESC LIMIT 1";
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
	$row = mysqli_fetch_array($result);
?>
</head>
<body>
	<div class="divider"></div>
	<div class="answer">
		<div class="content">
			<div class="votes" id="votes<?php echo $row['id_answer'];?>"></div>
			<div class=""><?php echo $row['content'];?></div>
		</div>
		<div class="details">answered by <?php echo $row['name'];?> at <?php echo $row['timestamp'];?></div>
	</div>
</body>
</html>
