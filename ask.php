<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/ask.css">
	<script>
		function validateQuestion(){
			var name = document.forms["AskForm"]["name"].value;
			var email = document.forms["AskForm"]["email"].value;
			var topic = document.forms["AskForm"]["topic"].value;
			var content = document.forms["AskForm"]["content"].value;
			var DefaultRegex= /[^ \t]/i;
			// validate name
			var DefaultTest = DefaultRegex.test(name);
			if(!DefaultTest){
				alert("Name must be filled");
				return false;
			}
			// validate email
			var EmailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			var EmailTest = EmailRegex.test(email);
			if(email == null || email == "" || !EmailTest){
				alert("Email must be filled correctly");
				return false;
			}
			// validate topic
			DefaultTest = DefaultRegex.test(topic);
			if(!DefaultTest){
				alert("Question Topic must be filled");
				return false;
			}
			//validate content
			DefaultTest = DefaultRegex.test(content);
			if(!DefaultTest){
				alert("Content must be filled");
				return false;
			}
		}
	</script>
	<title >Ask A Question</title>
</head>
<body>
		<h1 id="MainTitle">Simple StackExchange</h1>
	<div id="MainDiv">	
		<h3 id="SubTitle">What's your question?</h3>
		<hr>
		<form name="AskForm" action="createQuestion.php" onsubmit="return validateQuestion()" method="post">
			<input id="name" type="text" name="Name" placeholder="Name"> <br>
			<input id="email" type="text" name="Email" placeholder="Email"> <br>
			<input id="topic" type="text" name="QuestionTopic" placeholder="Question Topic"> <br>
			<textarea id="content" type="text" name="Content" placeholder="Content"></textarea> <br>
			<input id="post" type="submit" value="Post">
		</form>
	</div>
	
</body>
</html>