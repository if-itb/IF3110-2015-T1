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

<script type="text/javascript">
    function validateAskForm() {
        var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (document.forms["askform"]["Name"].value == null || document.forms["askform"]["Name"].value == "" || document.forms["askform"]["Title"].value == null || document.forms["askform"]["Title"].value == ""  ||
            document.forms["askform"]["Email"].value == null || document.forms["askform"]["Email"].value == "" ||
            document.forms["askform"]["Content"].value == null || document.forms["askform"]["Content"].value == "") {
            alert("All required fields must be filled out");
            return false;
        }
        else if(!re.test(document.forms["askform"]["Email"].value)){
            alert("Incorrect email address");
            return false;
        }
    }
</script>

<html>
	<head>
		<title> Simple StackExchange </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="ICON" href="icon.ico" type="image/ico"/>
	</head>
	<body>
		<h1><a id="a3" href="index.php">Simple StackExchange</a></h1>
		<br>
		<div id="div2">
			<p id="p3">
				What's your question?
			</p>
		</div>
		
		<div id="ask_box">
			<form name="askform" action="index.php" method="POST" onsubmit="return validateAskForm()">
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
