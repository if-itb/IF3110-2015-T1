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
		
		<div id="ask_box">
			<form action="index.php" method="POST">
				<div id="ask_namebox">
					<input type="text" placeholder="Name" name="Name" value="<?php echo $data['Name'] ?>" />
				</div>
				
				<div id="ask_emailbox">
					<input type="text" placeholder="Email" name="Email" value="<?php echo $data['Email'] ?>" />
				</div>
				
				<div id="ask_titlebox">
					<input type="text" placeholder="Question Topic" name="Title" value="<?php echo $data['Title'] ?>" />
				</div>
				
				<div id="ask_contentbox">
					<textarea name="Content" placeholder="Content"><?php echo $data['Content'] ?></textarea>
				</div>

				<div id="ask_submit">
					<input type="submit" value="Post" />
				</div>
				
				<input type="hidden" name="type" value="ask" />
				<input type="hidden" name="q_id" value="<?php echo $q_id ?>" />
			</form>
		</div>
	</body>
</html>
