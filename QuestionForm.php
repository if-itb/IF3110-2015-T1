<!DOCTYPE html>
<html>
	<head>
		<title>Simple Stack Exchange </title>
		<link rel="stylesheet" type="text/css" href="Style.css">
		<script type="text/javascript" src = "Validate.js"></script>
	</head>
	<body>

		<div class = "titlefont">
			<div class="textcentering">
				<h1>Simple Stack Exchange</h1>
			</div>
		</div>
		<?php
			include 'qDBFunct.php';
			if(isset($_GET['qid']))	$qid = $_GET['qid'];
			else $qid="";
			if(!isset($_GET['qid'])){
				echo "<h2>What's your question</h2><hr>";
				$result['qName']="";
				$result['qEmail']="";
				$result['qTopic']="";
				$result['qContent']="";
			}
			else {			
				$Question = getQuestion($qid);
				$result = mysqli_fetch_array($Question,MYSQLI_ASSOC);
				echo "<h2>Edit your question</h2><hr>";
			}
		?>
		<form name="qForm" action="SubmitQuestion.php" method="post" onsubmit="return validateForm()" >
			<div class="formpos">
				<input type="hidden" name="qid" value="<?php echo $qid ?>"/>
				<input type="text" name="name" placeholder="Nama" class="form-textfield" value="<?php echo $result['qName']?>"></input>
				<br>
				<input type="text" name="email" placeholder="Email" class="form-textfield" value="<?php echo $result['qEmail']?>"></input>
				<br>
				<input type="text" name="qtopic" placeholder="Question Topic" class="form-textfield" value="<?php echo $result['qTopic']?>"></input>
				<br>
				<textarea name="content" placeholder="Content" class="form-textarea"b><?php echo $result['qContent']?></textarea></input>
				<br>
				<div class="searchstyle">
					<input type="submit" value="Submit">
				</div>
			</div>
		</form>

	</body>
</html> 