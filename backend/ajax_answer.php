<html>
<head>
<?php
	include('connect-mysql.php');

	$id = $_GET['id'];
	$query = "SELECT * FROM answers WHERE question_id = '$id' ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($con, $query);
	mysqli_close($con);
	$answer = mysqli_fetch_array($result);
?>
</head>
<body>
	<div class="item">
		<table class="vote">
			<tr> <td align="center" valign="middle"> Up </td> </tr>
			<tr> <td align="center" valign="middle"><?php echo $answer['votes']; ?></td> </tr>
			<tr> <td align="center" valign="middle"> Down </td> </tr>
		</table>
		<p class="content"><?php echo $answer['content']; ?></p>
		<p class="pull-right"><b>asked by <?php echo $answer['name']; ?> at <?php echo $answer['created_at']; ?></b></p>
	</div>
	<hr>
</body>
</html>
	