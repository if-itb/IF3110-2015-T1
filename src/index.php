<html>
	<?php
		$servername = "localhost";
		$username = "webuser";
		$password = "webpass";
		
		// Create connection
		$link = mysql_connect($servername, $username, $password);
		
		if (!$link) {
			die('Could not connect: ' . mysql_error());
		}
		
		echo 'Connected successfully';
		mysql_close($link);
	?>
	<head>
		<title>Simple StackExchange</title>
	</head>
	
	<body>
		<h1>Simple StackExchange</h1>
		<p>Cannot find what you are looking for? Ask here.</p>
	</body>
</html>
