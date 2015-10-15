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
	<a href="index.php" style="text-decoration:none; color:black"><h1>Simple StackExchange</h1></a>
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

		$check = false;

		if ((!empty( $_POST['email'] ))&&(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
			?>
			<script type="text/javascript">
				window.alert("Error : Invalid email format!"); 
			</script>
			
			<?php 
		} 
		else {
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
				//alert error because of blank POST
				?>
				<script type="text/javascript">
					window.alert("Error : Form incompleted!");
					function validateEmail(email) {
					    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
					    return re.test(email);
					}
				</script>
			<?php 
			}
		} 

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if (! empty( $_GET["key"])) {
			$sql = "SELECT username, num_vote, content, topic, id_question, (SELECT COUNT(*) FROM answer WHERE answer.id_question=question.id_question) AS numans FROM question WHERE topic LIKE '%".$_GET["key"]."%' OR content LIKE '%".$_GET["key"]."%'";
		} else {
			$sql = "SELECT username, num_vote, content, topic, id_question, (SELECT COUNT(*) FROM answer WHERE answer.id_question=question.id_question) AS numans FROM question";	
		}

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	?>
		    	<table>
		    		<tr>
		    			<td class="vote" rowspan="2">
		    				<?php echo $row["num_vote"]; ?> 
		    			</td>
		    			<td class="vote" rowspan="2">
		    				<?php echo $row["numans"]; ?>
		    			</td>
	    				<td class="topic">
	    					<a href="answer.php?id=<?php echo $row["id_question"]; ?>" class="topic">
	    						<?php echo $row["topic"] ?>
	    					</a>
	    				</td>
	    				<td class="askedby">
	    				</td>
	  				</tr>
	  				<tr>
		  				<?php
				  			if(strlen($row["content"])<90) {
				  				echo '<td style="padding-left:2.6%" class="discontent">'. $row["content"].'</td><td></td>';
				  			} else {
				  				echo '<td style="padding-left:2.6%" class="discontent">';
				  				echo substr($row["content"], 0, 90);
				  				echo '...</td><td></td>';
				  			}
		    			?>
	    			</tr>
	    			<tr>
	    				<td class="vote1">
	    					Votes
	    				</td>
	    				<td class="vote1">
	    					Answers
	    				</td>
	    				<td class="topic">
	    				</td>
	    				<td class="askedby">
	    					asked by  
							<span class="user">
								<?php echo $row["username"]; ?>
							</span>
								|
	    					<span class="edit">
	    						<a href="editquestion.php?id=<?php echo $row['id_question']; ?>" class="edit">
	    						 edit 
	    						</a>
	    					</span>
	    						|
	    					<span class="delete"onclick="ConfirmDelete(<?php echo $row['id_question'];?>)"> <a href="index.php" class="delete">
	    						 delete 
	    						</a>
	    					</span>
	    				</td>
	  				</tr>
		        </table>
		        <hr> 
		    <?php
			}		    
		}  else { ?>
		    <div class="answerresult">No results</div>
		    <br><br><br>
	<?php 
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

	function ConfirmDelete(id_question) {
		del = confirm("Are you sure want to delete?");
	    if (del == true) {
	    	var xhttp = new XMLHttpRequest();
	    	var id = id_question;
			
			xhttp.onreadystatechange = function () {
				if (xhttp.readyState == 4) {
					// if ok, update
					//document.getElementById("vote_ans"+ID_ans).innerHTML = xhttp.responseText;
					// if not, show error
				}
			}

			xhttp.open("GET","delete.php?id=" + id, true);
			xhttp.send();
	       
	    }
	    else {
	    	//alert("hmmm");
	    }
	    
	}
</script>

</html> 