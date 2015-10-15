<?php
	require_once("./database.php");
?>

<?php
	if (isset($_POST['q_id'])) {
		if ($_POST['type'] == 'answer') {
			postAnswer($_POST);
		}
	}

	if (isset ($_GET['q_id'])) {
		$q_id = $_GET['q_id'];
		$question = getQuestion($q_id);
		$answers = getAnswers($q_id);
	}
	else {
		die('Error Query ['.$connect -> error. ']');
	}
?>

<script type="text/javascript">
    function vote(id,type,result){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
				if(type == 'question')
					document.getElementById("qvote").innerHTML = xhttp.responseText;
				else
					document.getElementById("avote"+id).innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("POST", "./vote.php", true);
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("action=" +result+ "&id=" + id + "&type=" + type);
    }
</script>

<script type="text/javascript">
function confirmDelete(id) {
	if (confirm("Do you want to delete this question?") == true) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
				  location.href = "./index.php";
				}
			}
        xhttp.open("POST", "./delete.php", true);
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);
	}
}
</script>

<script type="text/javascript">
    function validateAnswerForm() {
        var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (document.forms["answerform"]["Name"].value == null || document.forms["answerform"]["Name"].value == "" ||
            document.forms["answerform"]["Email"].value == null || document.forms["answerform"]["Email"].value == "" ||
            document.forms["answerform"]["Content"].value == null || document.forms["answerform"]["Content"].value == "") {
            alert("All required fields must be filled out");
            return false;
        }
        else if(!re.test(document.forms["answerform"]["Email"].value)){
            alert("Incorrect email address");
            return false;
        }
    }
</script>

<html>
<head>
	<title> Simple StackExchange </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="ICON" href="icon.ico" type="image/ico"/>
</head>

<body>
	<h1> <a id="a3" href="index.php">Simple StackExchange</a></h1>
	
	<div id="div3">
		<div id="div4">
			<div id="question_title">
				<?php echo $question['Title'] ?>
			</div>
			<div id="idx_vote">
				<div><a href="javascript:vote(<?php echo $q_id ?>, 'question', 'up')"><img src="Me_Gusta.png" width="32" height="32"></a></div>
				<div id="qvote"> <?php echo $question['Vote'] ?> </div>
				<div><a href="javascript:vote(<?php echo $q_id ?>, 'question', 'down')"><img src="Me_Disgusta.png" width="32" height="32"></a></div>
			</div>
			<div id="question_content">
				<?php echo $question['Content'] ?>
			</div>
			<div id="div5">
				<p>
					asked by <span id="idx_name"> <?php echo $question['Name'] ?> at <?php echo $question['Date'] ?> </span> | <span id="idx_edit"> <a id="a2" href="ask.php?q_id=<?php echo $question['Q_ID'] ?>"> edit </a> </span> | <span id="idx_delete"><a id="a4" href="javascript:confirmDelete(<?php echo $question['Q_ID'] ?> )" target="_parent" class="creator_delete"> delete </a> </span>
				</p>
			</div>
			
			<div id="AnswerCount">
				<?php 
					$count = countAnswers($_GET['q_id']);
				?>
				
				<?php echo $count ?> Answer<?php if ($count > 1) echo 's' ?>
			</div>
		</div>
	</div>

	<div id="div3">
		<?php foreach ($answers as $answer) : ?> 
		<div id="div4">
			<div id="idx_vote">
				<div><a href="javascript:vote(<?php echo $answer['A_ID'] ?>, 'answer', 'up')"><img src="Me_Gusta.png" width="32" height="32"></a></div>
				<div id="avote<?php echo $answer['A_ID'] ?>"> <?php echo $answer['Vote'] ?> </div>
				<div><a href="javascript:vote(<?php echo $answer['A_ID'] ?>, 'answer', 'down')"><img src="Me_Disgusta.png" width="32" height="32"></a></div>
			</div>
			<div id="question_content">
				<?php
					echo $answer['Content'];
				?>
			</div>
			<div id="div5">
				<p>
					answered by <span id="idx_name"> <?php echo $answer['Name'] ?> </span> at <span id="datetime"> <?php echo $answer['Date'] ?> </span>
				</p>
			</div>
		</div>
		<?php endforeach; ?>
	</div>

	<div id="question_box">
		<div id="YourAnswer">
			Your Answer
		</div>
		<form name="answerform" action="question.php?q_id=<?php echo $_GET['q_id'] ?>" method="POST" onsubmit="return validateAnswerForm()">
			<div id="question_namebox">
				<input type="text" placeholder="Name" name="Name" value="" />
			</div>
			
			<div id="question_emailbox">
				<input type="text" placeholder="Email" name="Email" value="" />
			</div>
			
			<div id="question_contentbox">
				<textarea name="Content" placeholder="Content"></textarea>
			</div>

			<div id="question_submit">
				<input type="submit" value="Post" />
			</div>
			
			<input type="hidden" name="type" value="answer" />
			<input type="hidden" name="q_id" value="<?php echo $q_id ?>" />
		</form>
	</div>
</body>
</html>
