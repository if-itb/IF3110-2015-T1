<!DOCTYPE html>
<html>
<head>
	<title>Answer</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="delete.js"></script>
	<script>
			function validateEmail(email) {
				var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	
				return re.test(email.value);
			}
			function validateForm() {
				var x = document.forms["myForm"]["Name"].value;
				if (x == null || x == "") {
					alert("Name must be filled out");
					return false;
				}
				var x = document.forms["myForm"]["Email"].value;
				if (x == null || x == "") {
					alert("email must be filled out");
					return false;
				}
				else if(!validateEmail(document.getElementById("email"))) {
					alert('Please enter a valid email address.');
					return false;
				}
				var x = document.forms["myForm"]["message"].value;
				if (x == null || x == "") {
					alert("Content must be filled out");
					return false;
				}
			}
			function voteQuestion(id, flag){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("question-"+id ).innerHTML = xhttp.responseText;
					}
				}
				xhttp.open("POST", "vote.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				//vote-up
				if(flag==0){
					xhttp.send("type=question&id="+id+"&flag="+flag);
				}//vote-down
				else{
					xhttp.send("type=question&id="+id+"&flag="+flag);
				}
			}
			function voteAnswer(id, flag){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						document.getElementById("answer-"+id ).innerHTML = xhttp.responseText;
					}
				}
				xhttp.open("POST", "vote.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				//vote-up
				if(flag==0){
					xhttp.send("type=answer&id="+id+"&flag="+flag);
				}//vote-down
				else{
					xhttp.send("type=answer&id="+id+"&flag="+flag);
				}
			}
			
	</script>
</head>
<body>
	<?php 
		function readQuestion($id_Question){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "stackexchange";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "SELECT Content, Vote, Email, Date FROM question WHERE ID_Question ='$id_Question'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
				echo '<div class="kotak">';
						echo "<img class='arrow' href='#' src='triangle-up.png' onclick='voteQuestion($id_Question,0)' >";
						echo "<br><br><span id='question-". $id_Question ."'>" . $row["Vote"] ."</span><br><br>";	
						echo "<img class='arrow' id='down' href='#' src='triangle-up.png' onclick='voteQuestion($id_Question,1)'   >";
				echo '</div>';
				echo '<div class= "question-box">';
					echo '<div class= "resQuestion">';
						echo "" . $row["Content"];
					echo "</div>";
					echo '<div class= "infoQuestion">';																										
						echo " asked by " . $row["Email"]. " at " . $row["Date"] . "|<a href='AskHere.php?id=".$id_Question."' id='y'> edit </a> |<a id='r'  href='javascript:deletePost(\"delete_question.php?id=$id_Question\")'>delete</a>|";
					echo "</div>";
				echo "</div>";
			}
			} else {
				echo "0 results";
			}
			mysqli_close($conn);
			
		}
		
		function readAnswer($id_Question){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "stackexchange";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$sqlans = "SELECT count(*) AS SUM  FROM  answer WHERE ID_Question = '$id_Question' ";
			$resultans = mysqli_query($conn, $sqlans);	
			$rowans = mysqli_fetch_array($resultans);
			echo "<div class='SubTitle'>";
				echo "<h2>" . $rowans["SUM"] . " Answer</h2>";
			echo "</div>";
			
					
			$sql = "SELECT ID_Answer, Content, Vote, Email, Date FROM answer WHERE ID_Question ='$id_Question' ORDER BY date";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
				echo '<div class="content">';
					echo '<div class="kotak">';
						echo "<img class='arrow' href='#' src='triangle-up.png' onclick='voteAnswer(". $row["ID_Answer"] .",0)' >";
						echo "<br><br><span id='answer-". $row["ID_Answer"] ."'>" . $row["Vote"] ."</span><br><br>";	
						echo "<img class='arrow' href='#' id='down' src='triangle-up.png' onclick='voteAnswer(". $row["ID_Answer"] .",1)' >";
					echo '</div>';
				
					echo '<div class= "container-answer">';
						echo '<div class= "resAnswer">';
							echo "" . $row["Content"];
						echo "</div>";
						echo '<div class= "infoAnswer">';
							echo " asked by " . $row["Email"]. " at " . $row["Date"];
						echo "</div>";
					echo "</div>";
				echo "</div>";
			}
			} else {
				echo "0 results";
			}
			mysqli_close($conn);
			
		}
	?>
	
	<div class="container">
		<h1>Simple StackExchange</h1>
		<br><br><br>
		
		<div class="box1">
				<div class="SubTitle">
				<h2>The question topic goes here </h2>
				</div>
				
				<div class="content" id="q" >
					<?php readQuestion( $_GET["id"]);?>
				</div>
		</div>
		<div class="box2">
				
				
				
					<?php readAnswer($_GET["id"]);?>
				
		</div>
		
		<div class="answerform">
		Your Answer
			<form name="myForm" onsubmit="return validateForm()" action="add_answer.php" method="post">
				<input type="text" name="Name" placeholder="Name" >
				<input type="text" id="email" name="Email" placeholder="Email">
				<input type="hidden" name ="id-question" value="<?php echo $_GET["id"];?>">
				<textarea placeholder= "Content" name="message"  ></textarea>
				<input class="button" type="submit" name="Post" value="Post">
			</form>
		</div>
	</div>	
</body>
</html>