<!DOCTYPE html>
<html>
<head>
	<title>
		Simple Stack Exchange
	</title>
</head>

<body>
	<h1 align="center">Simple Stack Exchange</h1>
	<br>
	<br>
	<h3 align="center">Cannot find what you are looking for? <a href="create.php">Ask here</a></h3>
	<h3 align="center">Recently Asked Questions</h3>
	<hr width="75%" align="center">
	<?php
		$conn = mysql_connect('localhost', 'root', '08161955342');
		mysql_select_db('simplestackexchange', $conn);
		$sql = "SELECT * FROM question";
		$result = mysql_query($sql);
	?>
	<div align="center">
	<?php while ($row = mysql_fetch_assoc($result)) { ?>
		<?php echo $row['vote'] . " "; ?>
		<?php echo $row['topic'] . " "; ?>
		<?php echo "aksed by ". $row['name'] . " "; ?>
		| edit | delete
		<br>
		<hr width="75%" align="center">
	<?php } ?>
	</div>
	<?php mysql_close($conn); ?>
</body>
</html>