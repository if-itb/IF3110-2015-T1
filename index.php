<?php
	// Connect to database
	$con=mysqli_connect("localhost","root","","stackexchange");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	if(isset($_GET['delete_id'])) 	{
		$sql="DELETE FROM question WHERE id_question=".$_GET['delete_id'];
		if ($con->query($sql) === TRUE) {
		    header("Location: index.php");
		    $sql="DELETE FROM answer WHERE id_question=".$_GET['delete_id'];
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
		<link rel="stylesheet" type="text/css" href="css/indexStyle.css">
		<title>Simple Stack Exchange</title>
	</head>
	<script type="text/javascript">
		function delete_id(id) {
		     if(confirm('Are you sure to delete this question?')) {
		        window.location.href='index.php?delete_id='+id;
		     }
		}
		function validateForm() {
		    var w = document.forms["searchBar"]["search"].value;

		    if (w == null || w == "") {
		        alert("Please fill the text box");
		        return false;
		    }
		}
	</script>
	<body>
		<h1>Simple StackExchange</h1>
		<form name="searching" action="search.php" onsubmit="return validateForm()" method="post">
			<input type="text" name="search" style="width:94%;font-size:16px;">
			<input type="submit" value="Search" style="font-size:16px;">
		</form>
		<h2>
			Cannot find what you are looking for? <a href="ask-question.html" style="text-decoration:none;"><font color="orange">Ask here</font></a>
		</h2>
		<h3>
			Recently Asked Question
		</h3>
		<?php
			$query = "SELECT * FROM question ORDER BY created_date DESC";
			$result = $con->query($query);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
		?>
		<hr>
		<table>
			<tr>
				<td class="number" rowspan="2"><b><?php echo $row["num_vote"];?><br>Votes</b></td>
				<?php
					$sql = "SELECT count(*) AS total FROM answer where id_question = ". $row["id_question"];
					$result2 = $con->query($sql);
					$values = $result2->fetch_assoc();
					$num_rows = $values['total'];
				?>
				<td class="number" rowspan="2"><b><?php echo $num_rows;?><br>Answers</b></td>
				<td class="topic"><a href="show-answer.php?id=<?php echo $row["id_question"];?>" style="text-decoration:none;"><font color='black'><?php echo $row["topic"]; ?></font></a></td>
			</tr>
			<tr>
				<?php $truncated = (strlen($row["content"]) > 130) ? substr($row["content"], 0, 130) . '...' : $row["content"]; ?>
				<td class="content"> <?php echo $truncated; ?> </td>
			</tr>
			<tr>
				<td colspan='3' class='attribute' style=text-align:right;> <b>asked by <font color='blue'> <?php echo $row["username"]; ?></font> | 
				<a href="edit-question.php?id=<?php echo $row["id_question"];?>" style="text-decoration:none;"> <font color="orange">edit</font></a> | 
				<a href="javascript:delete_id(<?php echo $row["id_question"]; ?>)" style="text-decoration:none;"><font color="red">delete</a></font></b></td>	
			</tr>
		</table>
		<?php
    		}
		} else {
		?>
			<hr>
			<p>0 results</p>
		<?php
		}
		$con->close();
		?>
		
	</body>

</html>