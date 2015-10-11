<?php
	require_once("./database.php");
?>

<?php
	if (isset ($_GET['q_id'])) {
		$q_id = $_GET['q_id'];
	}
	else {
		$q_id = '';
	}

	if ($q_id == '') {
		$data = array();
		$data['Name'] = '';
		$data['Email'] = '';
		$data['Title'] = '';
		$data['Content'] = '';
	}
	else {
		$data = getQuestion($q_id);
	}
?>

<html>
	<head>
		<title> Simple StackExchange </title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>Simple StackExchange</h1>
		<br>
		<div id="div2">
			<p id="p3">
				What's your question?
			</p>
		</div>
	</body>
</html>
