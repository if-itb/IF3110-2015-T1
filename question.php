<!DOCTYPE html>
<html>
	<head>
		<Title> Simple StackExchange </Title>
		<link rel="stylesheet" href="styles.css" type="text/css">
		<script>
			//Validate the Form
			function validateForm() {
			    // Alert if the name is empty
			    var result=true;
			    var name = document.forms["questionForm"]["name"].value;
			    if (name == null || name == "") {
			        alert ("Name must be filled out");
			        result=false;
			    }

			    //alert if the email is empty or is not correct
			    var email = document.forms["questionForm"]["email"].value;
				if (email==null || email=="") {
					alert ("Email must be filled out");
					result=false;
				}
				else if (!(/[\w][\@]+[a-z]+[\.]+[\w]/.test(email))) {
					alert ("Email must be filled out correctly");
					result=false;
				}

				//Alert if the question topic is empty
				var topic = document.forms["questionForm"]["questiontopic"].value;
			    if (topic == null || topic == "") {
			        alert ("Question Topic must be filled out");
			        result=false;
			    }	

			    //Alert if the content of question is empty
			    var content = document.forms["questionForm"]["content"].value;
			    if (content == null || content == "") {
			        alert ("Content must be filled out");
			        result=false;
			    }
			    return result;	    
			}
		</script>
		<meta> </meta>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h1> Simple Stack Exchange </h1>
			</div>
			<div class="question">
				<div class="heading"><h3> What's your question? </h3></div>
				<form action="answer.php" name="questionForm" method="post" onsubmit="return validateForm()">
					<div class="textbox">
						<!-- Name -->
						<input type="text" name="name" placeholder="Name" size="50">
					</div>
					<div class="textbox">
						<!-- Email -->
						<input type="text" name="email" placeholder="E-mail" size="50">
					</div>
					<div class="textbox">
						<!-- Question Topic -->
						<input type="text" name="questiontopic" placeholder="Question Topic" size="50">
					</div>
					<div class="textbox">
						<!-- Content -->
						<textarea type="text" name="content" placeholder="Content" cols="52" rows="7" ></textarea>
					</div>
					<div class="post-button"><input type="submit" value="Post"></div>
				</form>
			</div>
		</div>
	</body>
</html>