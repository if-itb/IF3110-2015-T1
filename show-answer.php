<?php
	// Connect to database
	$con=mysqli_connect("localhost","root","","stackexchange");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	if(isset($_GET["delete_id"])) 	{
		$sql="DELETE FROM question WHERE id_question=".$_GET["delete_id"];
		if ($con->query($sql) === TRUE) {
		    header("Location: index.php");
		    $sql="DELETE FROM answer WHERE id_question=".$_GET["delete_id"];
			if ($con->query($sql) === TRUE) {
			    header("Location: index.php");
				exit;
			} else {
			    echo "Error deleting record: " . $con->error;
			}
			exit;
		} else {
		    echo "Error deleting record: " . $con->error;
		}
	}
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/answerStyle.css">
		<script type="text/javascript" src="js/vote.js"></script>
		<title>Simple Stack Exchange - Show Answer</title>
	</head>
	<script type="text/javascript">
		function delete_id(id) {
		     if(confirm('Are you sure to delete this question?')) {
		        window.location.href='index.php?delete_id='+id;
		     }
		}
		function validateForm() {
		    var w = document.forms["answer"]["name"].value;
		    var x = document.forms["answer"]["email"].value;
		    var z = document.forms["answer"]["content"].value;
			var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

		    if (w == null || w == "" || x == null || x == "" || z == null || z == "") {
		        alert("Please fill all the text box");
		        return false;
		    } else if (!re.test(x)) {
		    	alert("Please enter a valid e-mail");
		    	return false;
		    }
		}
	</script>
	<body>
		<h1>Simple StackExchange</h1>
		<?php
			$id = $_GET["id"];
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM question where id_question = ". $id;
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
		?>
			<!--- Show question -->
			<h2><?php echo $row["topic"]; ?></h2>
			<hr>
			<table>
				<tr>
					<td class="number"><a class="vote" onclick="javascript:voteUpQuestion(<?php echo $row["id_question"]; ?>)">&#x25B2</a><br>
						<a id="numvote_q"><?php echo $row["num_vote"]; ?></a><br> 
						<a class="vote" onclick="javascript:voteDownQuestion(<?php echo $row["id_question"];?>)">&#x25BC</a>
					</td>
					<td class="content"><?php echo $row["content"]?></td>
				</tr>
				<tr>
					<td colspan="2" class="attribute" style="text-align:right;">asked by <?php echo $row["username"];?> at <?php echo $row["created_date"];?> | 
						<a href="edit-question.php?id=<?php echo $row["id_question"];?>" style="text-decoration:none;"><font color="orange">edit</font></a> | 
						<a href="javascript:delete_id(<?php echo $row["id_question"];?>)" style="text-decoration:none;"><font color="red">delete</a></font>
					</td>
			</tr>
			</table>

			<!--- Show answer -->
			<?php
				$sql = "SELECT count(*) AS total FROM answer where id_question = ". $id;
				$result = $con->query($sql);
				$values = $result->fetch_assoc();
				$num_rows = $values["total"];
			?>
			<h2><?php echo $num_rows;?> Answer</h2>
			<hr>
			<?php
				$sql = "SELECT * FROM answer where id_question = ". $id;
				$result = $con->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
			?>
					<table>
						<tr>
							<td class="number"><a class="vote" onclick="javascript:voteUpAnswer(<?php echo $row["id_answer"]; ?>)">&#x25B2</a><br>
							<a id="numvote_a_<?php echo $row["id_answer"];?>"><?php echo $row["num_vote"];?></a><br>
							<a class="vote" onclick="javascript:voteDownAnswer(<?php echo $row["id_answer"]; ?>)">&#x25BC</a></td>
							<td class="content"><?php echo $row["content"];?></td>
						</tr>
						<tr>
							<td colspan="2" class="attribute" style="text-align:right;">answered by <?php echo $row["username"];?>
						 	at <?php echo $row["ans_date"]?></td>
						</tr>
					</table>
					<hr>
			<?php
	        		}
				}
			?>
			<h3>Your Answer</h3>
			<form name="answer" action="add-answer.php" onsubmit="return validateForm()" method="post">
				<input type="hidden" class="text" name="id" value="<?php echo $id;?>">
				<input placeholder="Name" type="text" name="name" class="text"><br><br>
				<input placeholder="Email" type="text" name="email" class="text"><br><br>
				<textarea placeholder="Content" type="text" name="content" rows="10"></textarea><br><br>
			<input type="submit" value="Post" class="button">
			</form>
		
	</body>
</html>