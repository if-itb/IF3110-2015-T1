<!DOCTYPE html>
<html>
<head>
  	<title>Create</title>
  	<meta charset="UTF-8">

	<style>
	.title {
	    text-align: center;
	    font-size: 350%;
	    font-family:calibri;
	}
	.subtitle {
		margin-left:17.5%;
		text-align: left;
	    font-size: 250%;
	    font-family:calibri;
	}
	.line { 
	    margin-left:17.5%;
	    margin-right: 17.5%;
	    color: #000000;
		background-color: #000000;
		height: 3px;
		font-family:calibri;
	} 
	.column-one{
		margin-left:17.5%;
		width: 7.5%;
		color:black;
		text-align: center;
		float:left;
	}
	.column-two{
		margin-left:none; 
		width: 57.5%;
		color:black;
		text-align: left;
		float:left;
	}
	.row-bottom{
		margin-left:none; 
		margin-right:17.5%;
		width: 65%;
		color:black;
		text-align: right;
		float:right;
	}



	</style>
</head>
<body>

<?php include 'connect.php';?>


<div class="title">Simple StackExchange</div>
<br>



<?php
	if (isset($_GET['question_id'])){
		$question_id = mysqli_real_escape_string($conn, $_GET["question_id"]);
		$sql = "SELECT vote, topic, content, email FROM Question WHERE question_id = $question_id";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		$question_topic = "<div class='subtitle'>" . $row['topic'] . "</div>";
		$question_line = "<div class='line'> <hr> </div>";
		$question_vote = "<div class='column-one'>" . $row['vote'] . "<br>" . " Votes" . "</div>";
		$question_content = "<div class='column-two'>" . $row['content'] . "</div>";
		$question_username = "<div class='row-bottom'>" . "asked by " . $row['email'] . " at " . "7/10/1996 08.00" . " | " . "edit" . " | " . "delete" . "</div>";
		
		$question_all = $question_topic . $question_line . $question_vote . $question_content . $question_username;
		
		echo $question_all;



		$form = 
		"<form name='askForm' action='anspost.php' method='post'>
			<input type='hidden' name='question_id' value=' " . $question_id ."'>
			<input type='text' name='name' placeholder='Name' size='100'><br>
			<input type='text' name='email' placeholder='Email' size='100'><br>
			<textarea name='content' rows='5' cols='40' placeholder='Content'></textarea><br>
			<input type='submit' value='Post'>
		</form>";
		echo $form;

	}
	else{
		echo "An error occured, the question is not available";
	}
?>

<?php
	/*$sql = "SELECT vote, content, email FROM Answer WHERE question_id = 35";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$question_topic = "<div class='subtitle'>" . $row['topic'] . "</div>";
	$question_line = "<div class='line'> <hr> </div>";
	$question_vote = "<div class='column-one'>" . $row['vote'] . "<br>" . " Votes" . "</div>";
	$question_content = "<div class='column-two'>" . $row['content'] . "</div>";
	$question_username = "<div class='row-bottom'>" . "asked by " . $row['email'] . " at " . "7/10/1996 08.00" . " | " . "edit" . " | " . "delete" . "</div>";
	
	$question_all = $question_topic . $question_line . $question_vote . $question_content . $question_username;
	
	echo $question_all;*/
?>


<br>
<br>
<br>
<br>
<br>
<br>
<div class="line"> <hr> </div>
<br>

<form name="askForm" action="anspost.php" method="post">
	<input type='hidden' name='question_id' value='5'>
	<input type="text" name="name" placeholder="Name" size="100"><br>
	<input type="text" name="email" placeholder="Email" size="100"><br>
	<textarea name="content" rows="5" cols="40" placeholder="Content"></textarea><br>
	<input type="submit" value="Post">
</form>



</body>
</html>
