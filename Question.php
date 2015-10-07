<!DOCTYPE html>
<html>
	<head>
		<title>Simple Stack Exchange </title>
		<link rel="stylesheet" type="text/css" href="Style.css">
		<script type="text/javascript" src = "Validate.js"></script>
	</head>
	<body>

		<h1>Simple Stack Exchange</h1><br>
		<h2>What's your question</h2>
		<form name="qForm" action="Submit.php" method="post" onsubmit="return validateForm()" >
			<div class="formpos">
				<input type="text" name="name" placeholder="Nama" class="form-textfield"></input>
				<br>
				<input type="text" name="email" placeholder="Email" class="form-textfield">
				<br>
				<input type="text" name="qtopic" placeholder="Question Topic" class="form-textfield">
				<br>
				<textarea name="content" placeholder="Content" class="form-textarea"></textarea>
				<br>
				<div class="searchstyle">
					<input type="submit" value="Submit">
				</div>
			</div>
		</form>

	</body>
</html> 