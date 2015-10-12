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
</script>



<body>
<?php
	$questions = searchQuestion($_POST["Keyword"]);
?>

<!-- Questions -->
<br><br>
<div class = "left">Search Result</div>
<table style="width:100%" name = "RAQ">
	<?php foreach ($questions as $question){ ?>
	<tr>
		<td>
			<?php 
			echo $question["q_vote"]; ?><br/>
			Vote(s)
		</td>
		<td>
			<?php 
				$answer = getAnswer($question["q_id"]);
				echo count($answer);
			 ?><br/>
			Answer(s)
		</td>
		<td>
			<a href = "Answer.php?id=<?= $question["q_id"] ?>">
				<?php echo $question["q_topic"]; ?>
			</a><br/><br/>
			<?php echo substr($question["q_content"], 0, 30); ?><br/>
		</td>
		<td>
			<br/>
			<?php echo "asked by ";
				echo $question["q_name"];
				echo " | " ?>
			<a href = "Edit.php?id=<?= $question["q_id"] ?>">edit</a> | 
			<a href = "#" onclick = "delQuestion(<?= $question["q_id"] ?>)" id = "delete<?= $question["q_id"] ?>"> delete</a> 		
		</td>
	</tr>
	<?php } ?>
</table>

</div>	



<?php
	include("Footer.php");
?>
