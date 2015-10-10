<!DOCTYPE html>
<html lang = "en">
	<head>
		<link rel="stylesheet" type="text/css" href="questionStyle.css">
		<title>Simple Stack Exchange - Edit Question</title>
		<script>
			function validateForm() {
			    var w = document.forms["question"]["name"].value;
			    var x = document.forms["question"]["email"].value;
			    var y = document.forms["question"]["topic"].value;
			    var z = document.forms["question"]["content"].value;
				var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

			    if (w == null || w == "" || x == null || x == "" || y == null || y == "" || z == null || z == "") {
			        alert("Please fill all the text box");
			        return false;
			    } else if (!re.test(x)) {
			    	alert("Please enter a valid e-mail");
			    	return false;
			    }
			}
		</script>
	</head>

	<body>
		<h1>
			Simple Stack Exchange
		</h1>
		<h2 >
			What's your question?
		</h2>
		<hr>
		<?php
			$con=mysqli_connect("localhost","root","","stackexchange");
			// Check connection
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$id = $_GET["id"];
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM question where id_question = '$id'";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			echo '<form name = "question" action="update-question.php" onsubmit="return validateForm()" method="post">';
			echo '<input type="hidden" class="text" name="id" value='. $id. ">";
			echo '<input placeholder="Name" type="text" name="name" class="text" value='. $row["username"]. '>'. '<br>'. '<br>';
			echo '<input placeholder="Email" type="text" name="email" class="text" value='. $row["email"]. '>'. '<br>'. '<br>';
			echo '<input placeholder="Question Topic" type="text" name="topic" class="text" value='. $row["topic"]. '>'. '<br>'. '<br>';
			echo '<textarea placeholder="Content" type="text" name="content" rows="10">'. $row["content"]. '</textarea>'. '<br>'. '<br>';
			echo '<input type="submit" value="Post" class="button">';
			echo '</form>';
		?>
	</body>
	
</html>