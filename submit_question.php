<html>
<body>
	<?php
		$conn = mysql_connect('localhost', 'root', '08161955342');
		if (!$conn)
			echo "Error";
		else
			echo "Success";

    	mysql_select_db('simplestackexchange', $conn);

		$sql = "INSERT INTO question (name, email, topic, content) VALUES (
			'".$_POST["name"]."',
			'".$_POST["email"]."',
			'".$_POST["topic"]."',
			'".$_POST["content"]."'
		)";

		if (mysql_query($sql))
			echo "Your question was submitted successfully";
		else
			echo "Error" . mysql_error();
		mysql_close($conn);
	?>
</body>
</html>