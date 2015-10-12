<!DOCTYPE html>
<html>
<title>
	Simple Stack Exchange Question
</title>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<a href="index.php" style="text-decoration:none; color:black"><h1>Simple StackExchange</h1></a>

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stackexchange";

		$id = intval($_GET['id']);

		if ((!empty( $_POST['email'] ))&&(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {

			?>
			<script type="text/javascript">
				window.alert("Error : Invalid email format!"); 
			</script>
			
			<?php 
		} 
		else {
			if ((!empty( $_POST ))&&($_POST['user'] != "")&&($_POST['email'] != "")&&($_POST['content'] != "")) {

		 		$user = $_POST['user'];
		 		$email = $_POST['email'];
		 		$content = $_POST['content'];

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				$sql = "INSERT INTO answer (username, email, content, id_question, num_votes)
				VALUES ('{$conn->real_escape_string($_POST['user'])}','{$conn->real_escape_string($_POST['email'])}','{$conn->real_escape_string($_POST['content'])}','{$conn->real_escape_string($id)}', 0)";
				if ($conn->query($sql) === TRUE) {
				    //echo "Record inserted successfully";
				} else {
				    //echo "Error in inserting record: " . $conn->error;
				}
				$conn->close();
			} else if (empty($_POST)){

		} else if (($_POST['user'] == "")||($_POST['email'] == "")||($_POST['content'] == "")) {
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

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT username, num_vote, content, topic, question_date FROM question WHERE id_question=" .$id;
		$result = $conn->query($sql);


		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	?>
		    	<h2>
		    		<?php echo $row["topic"];?>
		    	</h2>
				<hr>
				<table>
					<tr>
		    			<td class='arrow' id='vote_up' value= '1'>
		    				 &#128314 
		    			</td>
		    			<td class="qacontent" rowspan="3">
		    				<?php echo $row["content"];?>
		    			</td>
	    			</tr>
	    			<tr>
	    				<td class="total" id="votes">
	    					<?php echo $row["num_vote"];?>
	    				</td>
	    			</tr>
	    			<tr>
	    			<td class="arrow" id="vote_down">
	    				&#128315
	    			</td>
	    			<tr></tr>
					<tr>
						<td></td>
						<?php $vote = $row['num_vote']; ?>
		    		<td class="askedby">
		    			asked by 
	    				<span class="user">
	    					<?php echo $row["username"];?>
	    				</span>
	    				at 
	    				<span class="time">
	    					<?php echo $row["question_date"];?>
	    				</span>
	    				|
	    				<span class="edit">
	    					<a href="editquestion.php?id=<?php echo intval($_GET['id']);?>" class="edit">
	    					 edit 
	    					</a>
	    				</span>
	    				|
	    				<span class="delete" onclick="ConfirmDelete();">
	    					<a href="index.php?id=<?php echo intval($_GET['id']);?>" class="delete">
	    					 delete 
	    					</a>
	    				</span>
	    			</tr>
	    		</table>
	    		<br>

	    		<?php
	    		if ($vote != $row['num_vote']) {
	    			if(isset($_GET['id'])) {
				        $add = 'UPDATE question SET num_vote="'.$vote.'" WHERE id_question='. $id;
						if ($conn->query($add) === TRUE) {
						}
					}
	    		}
		        
		    }
		} else {
		    echo "0 results";
		}

		$sql = "SELECT COUNT(*) as numans FROM answer WHERE id_question=".$id;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		echo "<h2><span id='numans'>".$row["numans"]."</span> Answer</h2><hr>";
		
		$sql = "SELECT username, num_votes, content, answer_date, num_answer FROM answer WHERE id_question=" .$id;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) { ?>
		    	<table>
		    		<tr>
		    			<td class='arrow' id='vote_up_ans<?php echo $row["num_answer"];?>' onclick='voteUpAns(<?php echo $row["num_answer"];?>)'>
		    			 &#128314 
		    			</td>
	    				<td class="qacontent" rowspan="3">
	    					<?php echo $row["content"];?>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td class="total" id="vote_ans<?php echo $row["num_answer"];?>">
	    					<?php echo $row["num_votes"];?>
	    				</td>
	    			</tr>
	    			<tr>
	    				<td class="arrow" id="vote_down_ans<?php echo $row["num_answer"];?>" onclick="voteDownAns(<?php echo $row['num_answer'];?>)">
	    				 &#128315 
	    				</td>
	    			<tr>
	    			</tr>
					<tr>
						<td></td>
					<td class="askedby">
						answered by 
	    				<span class="user">
	    					<?php echo $row["username"];?> 
	    				</span>at 
	    				<span class="time">
	    					<?php echo $row["answer_date"];?> 
	    				</span>
	    			</td>
	    		</tr>
	    	</table>
	    	<hr><br>
	    	<?php
		    }
		} else {
		    echo '<div class="answerresult">No results</div>';
		    echo "<br><br><br>";
		}?>

		<br>
		<h4>Your Answer</h4>
		<hr>
		<form action= "answer.php?id=<?php echo $id;?>" method="post">
			<input type="text" name="user" placeholder="Name">
			<br>
		  	<input type="text" name="email" placeholder="Email">
		  	<br>
		  	<textarea type="text" rows="7" name="content" placeholder="Content" class="content"></textarea>
		  	<br>
		  	<input type="submit" value="Post" class="post">
		</form>
		<?php 
		$conn->close();
	?>
</body>

	<script type="text/javascript">
		document.getElementById('vote_up').onclick = function() 
		{ 
			var numvote = parseInt(document.getElementById('votes').innerHTML);
			var id = <?php Print(intval($_GET['id'])); ?>;

			var xhttp = new XMLHttpRequest()
		   	numvote++;
			xhttp.onreadystatechange = function () {
				if (xhttp.readyState == 4) {
					// if ok, update
					document.getElementById("votes").innerHTML = xhttp.responseText;
					// if not, show error
				}
			}

			xhttp.open("GET","numbervote.php?numvote=" + numvote + "&id=" + id, true);
			xhttp.send();
		}

		document.getElementById('vote_down').onclick = function() 
		{ 
			var numvote = parseInt(document.getElementById('votes').innerHTML);
			var id = <?php Print(intval($_GET['id'])); ?>;

			var xhttp = new XMLHttpRequest()
		   	numvote--;
			xhttp.onreadystatechange = function () {
				if (xhttp.readyState == 4) {
					// if ok, update
					document.getElementById("votes").innerHTML = xhttp.responseText;
					// if not, show error
				}
			}

			xhttp.open("GET","numbervote.php?numvote=" + numvote + "&id=" + id, true);
			xhttp.send();
		}

		function voteUpAns(ID_ans) {
			var numvote = parseInt(document.getElementById('vote_ans'+ID_ans.toString()).innerHTML);
			var id = <?php Print(intval($_GET['id'])); ?>;
			var xhttp = new XMLHttpRequest()
		   	numvote++;
			xhttp.onreadystatechange = function () {
				if (xhttp.readyState == 4) {
					// if ok, update
					document.getElementById("vote_ans"+ID_ans).innerHTML = xhttp.responseText;
					// if not, show error
				}
			}

			xhttp.open("GET","numbervoteans.php?numvote=" + numvote + "&id=" + id + "&id_ans=" + ID_ans, true);
			xhttp.send();
		}

		function voteDownAns(ID_ans) {
			var numvote = parseInt(document.getElementById('vote_ans'+ID_ans.toString()).innerHTML);
			var id = <?php Print(intval($_GET['id'])); ?>;
			var xhttp = new XMLHttpRequest()
		   	numvote--;
			xhttp.onreadystatechange = function () {
				if (xhttp.readyState == 4) {
					// if ok, update
					document.getElementById("vote_ans"+ID_ans).innerHTML = xhttp.responseText;
					// if not, show error
				}
			}

			xhttp.open("GET","numbervoteans.php?numvote=" + numvote + "&id=" + id + "&id_ans=" + ID_ans, true);
			xhttp.send();
		}

	</script>

</html>