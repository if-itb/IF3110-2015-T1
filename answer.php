<?php /*
	include 'db_connect.php';
	// Variable for DB Connection
	$servername = "localhost";
	$username = "admin";
	$password = "root";
	$dbname="stackexchange";
	$connection = new db_connect($servername, $username, $password, $dbname);
	$connection->connect();
	$connection->postQuestion($_POST["name"], $_POST["email"], $_POST["questiontopic"],$_POST["content"]);
	$connection->close_connection();
	*/
?>

<html>
	<head>
		<Title> Simple StackExchange </Title>
		<link rel="stylesheet" href="styles.css" type="text/css">
		<meta> </meta>
		<script>
			//Validate the Form
			function validateForm() {
			    // Alert if the name is empty
			    var result=true;
			    var name = document.forms["answerForm"]["name"].value;
			    if (name == null || name == "") {
			        alert ("Name must be filled out");
			        result=false;
			    }

			    //alert if the email is empty or is not correct
			    var email = document.forms["answerForm"]["email"].value;
				if (email==null || email=="") {
					alert ("Email must be filled out");
					result=false;
				}
				else if (!(/[\w][\@]+[a-z]+[\.]+[\w]/.test(email))) {
					alert ("Email must be filled out correctly");
					result=false;
				}

			    //Alert if the content of answer is empty
			    var content = document.forms["answerForm"]["content"].value;
			    if (content == null || content == "") {
			        alert ("Content must be filled out");
			        result=false;
			    }
			    return result;	    
			}
		</script>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h1> Simple Stack Exchange </h1>
			</div>

			<!--Question Section -->
			<div class="question">
				<div >
					<h3>Question Topic Here
						<!--<?php echo $_POST["questiontopic"]?>--></h3>
				</div>
				<!-- Question content -->
				<div>
					<!-- Vote Section -->
					<div class="vote">
						
					</div>
				</div>
				<!--Footer content -->
				<div>
					<!--<p>
					<?php /*echo "asked by ", $_POST["username"]," at ", getTimestamp("question", getQuestionId("question", $_POST["username"], $_POST["questiontopic"])); */?> | <a href="#" id="editPost">edit</a> | <a href="#" onclick="" id="deletePost">delete</a> </p>
					-->
				</div>
			</div>
			<!-- Answer Section -->
			<div class="answer">
				<!-- PHP here to print all the answer of the question -->
			</div>


			<div class="question">
				<form action="answer.php" method="post" name="answerForm" onsubmit="return validateForm()">
					<div class="textbox">
						<!-- Name -->
						<input type="text" name="name" placeholder="Name" size="50">
					</div>
					<div class="textbox">
						<!-- Email -->
						<input type="text" name="email" placeholder="E-mail" size="50" >
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