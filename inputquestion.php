<!DOCTYPE  html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<script type= "text/javascript">
		function validateinput()
		{
			var Name = 	document.forms["ask"]["name"].value;
			var Email = document.forms["ask"]["email"].value;
			var Topic = document.forms["ask"]["topic"].value;
			var Content = document.getElementById("content").value;

			if ((Name == null) || (Email == null) || (Topic == null) || (Content == null))
			{
				alert("All fields must be filled out!");
				return false;
			}	
		}
	</script>
	<title>Ask Question</title>
</head>

<body>
	<div id="pageheader">
		<h1>Simple StackExchange</h1>
		<br>
	</div>

	<h2>What's your question?</h2>
	<hr>
	<br>
	<div id="form">
		<div class="content">
			<form id="ask" action="submitQuestions.php" method="post" onsubmit="return validateinput()">
				<input type="text" id="name" name="name" placeholder="Name">
				<br>
				<input type="text" id="email" name="email" placeholder="Email">
				<br>
				<input type="text" id="topic" name="topic" placeholder="Topic">
				<br>
				<textarea id="content" name="content" placeholder="Content" rows="5" cols="40"></textarea>
				<br>
				<button id="postbutton" type="submit">Post</button>
			</form>
		</div>
	</div>
</body>