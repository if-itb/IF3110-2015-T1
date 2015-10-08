<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/qstyle.css"/>
	<title>Questions</title>
</head>
<body>
	<?php
	if(isset($_POST['update'])) {
		$conn = new mysqli("localhost","root","","stackoverflow");
		if($conn->connect_error)
			die("Connection failed : ".$conn->connect_error);
		$sql = "UPDATE questions 
				SET
					name = '".$_POST['name']."', 
					email = '".$_POST['email']."',
					question = '".$_POST['question']."',
					content = '".$_POST['content']."'
				WHERE no=11		
				";
		if($conn->query($sql)==TRUE) {
			echo "data updated";
		}
		else {
			echo "error : ".$sql."<br>".$conn->error;
		}	
	}
	else { ?>
	 <div id="big">Simple StackExchange</div>
	 <div class="medium" id="m1">Edit your question</div>
	<form method="post" action="<?php $_PHP_SELF?>">
	<?php $conn = new mysqli("localhost","root","","stackoverflow");
	if($conn->connect_error)
		die("Connection failed : ".$conn->connect_error);
	$sql = "SELECT * FROM questions WHERE no=11";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
		echo "<input type=\"text\" name=\"name\" value=\"".$row["name"]."\" placeholder=\"Name\" class=\"medium\">";
		echo "<input type=\"email\" name=\"email\" value=\"".$row["email"]."\" placeholder=\"Email\" class=\"medium\">";
		echo "<input type=\"text\" name=\"question\" value=\"".$row["question"]."\" placeholder=\"Question Topic\" class=\"medium\">";
		echo "<textarea type=\"text\" name=\"content\" placeholder=\"Content\" class=\"medium\" id=\"content\">".$row["content"]."</textarea>"; 
		echo "<input type=\"submit\"  name=\"update\" value=\"Edit\" id=\"button\">";
	$conn->close();
	?></form>
	<?php }	?>
</body>
</html>