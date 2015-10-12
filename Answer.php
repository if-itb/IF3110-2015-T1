<?php
	require_once("Database.php");
	include("Header.php");
?>


<script>
function delQuestion(qID){
	var xhttp = new XMLHttpRequest();
	
	if (confirm("Delete this question?")){
		var q_id = qID;
		var delPost = "qID=" + qID;
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200){
				window.location = "";
			}
		}
		xhttp.open("POST", "/AJAX/Del_Q.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(delPost);
	}
	
}

function validateForm() {
    var askName = document.forms["Ask"]["Name"].value;
	var askEmail = document.forms["Ask"]["Email"].value;
	var askContent = document.forms["Ask"]["Content"].value;
	
    if (askName == null || askName == "") {
        alert("Name must be filled out");
        return false;
    }
	if (askEmail == null || askEmail == "") {
        alert("Email must be filled out");
        return false;
    }
	else {
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if (re.test(askEmail) == false){
			alert("Email is not valid");
			return false;
		}
	}
	if (askContent == null || askContent == "") {
        alert("Content must be filled out");
        return false;
    }
	
	ansQuestion();
	
}

/* Vote Function */
function voteUpQuestion(qID){
	var xhttp = new XMLHttpRequest();
	var q_id = qID;
	var vuq = "qID=" + qID;
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200){
			window.location = "";
		}
	}
	xhttp.open("POST", "/AJAX/VoteUpQuestion.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(vuq);
}

function voteDownQuestion(qID){
	var xhttp = new XMLHttpRequest();
	var q_id = qID;
	var vdq = "qID=" + qID;
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200){
			window.location = "";
		}
	}
	xhttp.open("POST", "/AJAX/VoteDownQuestion.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(vdq);
}

function voteUpAnswer(aID){
	var xhttp = new XMLHttpRequest();
	var a_id = aID;
	var vua = "aID=" + aID;
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200){
			window.location = "";
		}
	}
	xhttp.open("POST", "/AJAX/VoteUpAnswer.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(vua);
}

function voteDownAnswer(aID){
	var xhttp = new XMLHttpRequest();
	var a_id = aID;
	var vda = "aID=" + aID;
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200){
			window.location = "";
		}
	}
	xhttp.open("POST", "/AJAX/VoteDownAnswer.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(vda);
}

</script>


<p id = "Answer"></p>
<script>
function ansQuestion(){
	var xhttp = new XMLHttpRequest();
	
	var name = document.getElementById("Name").value;
	var email = document.getElementById("Email").value;
	var content = document.getElementById("Content").value;
	var qid = document.getElementById("qID").value;
	
	var ansQ = "name=" + name + "&email=" + email + "&content=" + content + "&qid=" + qid;
	
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200){
			document.getElementById("Answer").innerHTML = xhttp.responseText;
		}
	}

	xhttp.open("POST", "AJAX/Ans_question.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(ansQ);
}

</script>

<?php
	$question = getQuestionByID($_GET['id']);
	$answer = getAnswer($_GET['id']);
?>

<!-- Question -->
<div class = "center">
	<div class = "left">
		<p2> <?php echo $question["q_topic"];?> </p2>
	</div>
	
	<table>
		<tr>
			<td>
				<img src = "/img/voteup.jpg" width = "20" height = "20" onclick = "voteUpQuestion(<?= $question["q_id"] ?>)" id = "voteup<?= $question["q_id"] ?>"></a><br/>
				
				<?php echo $question["q_vote"];?><br/>
				
				<img src = "/img/votedown.jpg" width = "20" height = "20" onclick = "voteDownQuestion(<?= $question["q_id"] ?>)" id = "votedown<?= $question["q_id"] ?>"></a><br/>
			</td>
			<td>
				<?php echo $question["q_content"];?><br/><br/>
				<div class = "right">
					<?php echo "asked by ";
						echo $question["q_name"];
						echo " | " 
					?>
					<a href = "Edit.php?id=<?= $question["q_id"] ?>">edit</a> | 
					<a href = "#" onclick = "delQuestion(<?= $question["q_id"] ?>)" id = "delete<?= $question["q_id"] ?>"> delete</a>
				</div>
			</td>
		</tr>
	</table>

<!-- Answers -->

<div class = "left">
	<p2>
		<?= count($answer); ?>
		Answer(s)
	</p2>
</div>

<table>
	<?php foreach (getAnswer($question["q_id"]) as $answer){ ?>
	<tr>
		<td>
			<img src = "/img/voteup.jpg" width = "20" height = "20" onclick = "voteUpAnswer(<?= $answer["a_id"] ?>)" id = "voteupa<?= $answer["a_id"] ?>"></img><br/>
			
			<?php echo $answer["a_vote"]; ?><br/>
			
			<img src = "/img/votedown.jpg" width = "20" height = "20" onclick = "voteDownAnswer(<?= $answer["a_id"] ?>)" id = "votedowna<?= $answer["a_id"] ?>"> </img><br/>
		</td>
		<td>
			<?php echo $answer["a_content"]; ?><br/><br/>
			<div class = "right">
				<?php echo "answered by ";
					echo $answer["a_name"];
					echo " at ";
					echo $answer["a_date"];
				?>	
			</div>
		</td>
	</tr>
	<?php } ?>
</table>	
	

	<table>
		<tr>
			<td>
				<form action = "Home.php" method = "post" name = "Ask">
					<input type= "text" name= "Name" size = "80" placeholder = "Name" id = "Name"/><br/>	
					<input type= "text" name= "Email" size = "80" placeholder = "Email" id = "Email"/><br/>
					<textarea name = "Content" rows="4" cols="81" placeholder = "Content" id = "Content"></textarea><br/>
					<input type= "hidden" name = "qID" value = "<?= ($_GET['id'])?>" id = "qID"/>
		
					<div class = "right"><input type = "button" onclick = "validateForm()" value = "Post" /> </div>
				</form>
			</td>	
		</tr>
	</table>

</div>



<?php

	include("Footer.php");
?>