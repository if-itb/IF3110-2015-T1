<!DOCTYPE html>
<html>
<title>
	Simple Stack Exchange
</title>
<head>
  <link rel="stylesheet" href="style.css">
  <base href="http://localhost/WBD/index.php?id="/>
</head>
<body>
	<h1>Simple StackExchange</h1>
	<div>
		<form action="index.php?key=" method="GET">
		<span>
			<input type="text" name="key" class="search"></input>
		</span>
		<span>
			<input type="submit" class="buttonsearch" value="Search">
		</span>
		</form>
	</div>
	<h3>
		Cannot find what you are looking for? 
		<a href="question.php" class="ask">Ask here</a>
	</h3>
	<h2 style="color:darkblue">Recently Asked Questions</h2>
	<hr>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stackexchange";

		if ((!empty( $_POST['email'] ))&&(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {

		?>
		<script type="text/javascript">
			window.alert("Error : Invalid email format!"); 
		</script>
		
		<?php } else {
		// Only process the form if $_POST isn't empty
		if ((!empty( $_POST ))&&($_POST['user'] != "")&&($_POST['email'] != "")&&($_POST['topic'] != "")&&($_POST['content'] != "")) {
	 		
	 		

	 		$user = $_POST['user'];
	 		$email = $_POST['email'];
	 		$topic = $_POST['topic'];
	 		$content = $_POST['content'];

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			$sql = "INSERT INTO question (username, email, content, topic, num_vote)
			VALUES ('{$conn->real_escape_string($_POST['user'])}','{$conn->real_escape_string($_POST['email'])}','{$conn->real_escape_string($_POST['content'])}','{$conn->real_escape_string($_POST['topic'])}', 0)";

			$_POST['user'] == "";
			$_POST['email'] == "";
			$_POST['topic'] == "";
			$_POST['content'] == "";
			$conn->query($sql);
			$conn->close();
		} else if (empty($_POST)){

		} else if (($_POST['user'] == "")||($_POST['email'] == "")||($_POST['topic'] == "")||($_POST['content'] == "")) {
			// munculin kotak dialog yang tampilin kalo gagal insert data

		?>


			<script type="text/javascript">
				window.alert("Error : Form incompleted!");
				function validateEmail(email) {
				    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
				    return re.test(email);
				}
			</script>

		<?php }
	} 

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if (! empty( $_GET["key"])) {
			$sql = "SELECT username, num_vote, content, topic, id_question FROM question WHERE topic LIKE '%".$_GET["key"]."%' OR content LIKE '%".$_GET["key"]."%'";
		} else {
			$sql = "SELECT username, num_vote, content, topic, id_question FROM question";	
		}

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	echo "<table>";
		    	echo "<tr>";
	    		echo '<td class="vote" rowspan="2">'.$row["num_vote"].'</td>';
	    		echo '<td class="vote" rowspan="2" id="numans" onload="countAns('.$row["id_question"].');">0';
	    		echo '</td>';
	    		echo '<td class="topic"><a href="answer.php?id='.$row["id_question"].'" class="topic">'. $row["topic"].'</a></td>';
	    		echo '<td class="askedby"></td>';
	  			echo "</tr>";
	  			echo "<tr>";
	  			if(strlen($row["content"])<90) {
	  				echo '<td style="padding-left:2.6%" class="discontent">'. $row["content"].'</td><td></td>';
	  			} else {
	  				echo '<td style="padding-left:2.6%" class="discontent">';
	  				echo substr($row["content"], 0, 90);
	  				echo '...</td><td></td>';
	  			}
	    		
	    		echo '</tr><tr>';
	    		echo '<td class="vote1">Votes</td>';
	    		echo '<td class="vote1">Answers</td>';
	    		echo '<td class="topic"></td>';
	    		echo '<td class="askedby">asked by '; 

	    		echo '<span class="user">'. $row["username"].' </span>|';
	    		echo '<span class="edit"><a href="editquestion.php?id='.$row["id_question"].'" class="edit"> edit </a></span>|';
	    		echo '<span class="delete" onclick="ConfirmDelete();"><a href="index.php?id='.$row["id_question"].'" class="delete"> delete </a></span>';
	    		?>
	    		<script type="text/javascript">
				function ConfirmDelete() {
				    var r = confirm("Are you sure want to delete?");
				    if (r == true) {
				        <?php
						if(isset($_GET['id'])) {
							$sql = 'DELETE FROM question WHERE `id_question` =  '.intval($_GET['id']);
							if ($conn->query($sql) === TRUE) {
								$sql = 'DELETE FROM answer WHERE `id_question` =  '.intval($_GET['id']);
								$conn->query($sql);
							    //echo "Record deleted successfully";
							} else {
							    //echo "Error deleting record: " . $conn->error;
							}
							Header('Location: index.php');
						
						}
						?>

				    }
				}
				</script>

	    		<?php

	    		echo '</td>';
	  			echo '</tr>';
		        echo "</table>";
		        echo "<hr>";
		        
		    }
		    

		    
		} else {
		    echo '<div class="answerresult">No results</div>';
		    echo "<br><br><br>";
		}

		

		$conn->close();

				
	?>

</body>

<script type="text/javascript">
	function countAns(id_question) {
		var id = id_question;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (xhttp.readyState == 4) {
				// if ok, update
				document.getElementById("numans").innerHTML = xhttp.responseText;
				// if not, show error
			}
		}

		xhttp.open("GET","numberans.php?id=" + id, true);
		xhttp.send();
	}
</script>

</html> 