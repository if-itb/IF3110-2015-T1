<?php
	require_once("./Database.php");
	include("./Header.php");
?>



<script>
function search() {
     
}

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

<!-- Search box -->
<div class = "center">
<form>
	<input type= "search" name= "Search" size = "50">
	<input type = "button" onclick = "myFunction()" value = "Search" /> 
</form>
	Cannot find what you are looking for? <a href = "Ask.php"> Ask here </a>




<br><br>
<div class = "left">Recently Asked Questions</div>
<table style="width:100%" name = "RAQ">
	<?php foreach (getQuestion() as $question){ ?>
	<tr>
		<td>
			<?php 
			echo $question["q_vote"]; ?><br/>
			Vote(s)
		</td>
		<td>
			<?php 
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
			<a href = "Edit.php">edit</a> | 
			<a href = "#" onclick = "delQuestion(<?= $question["q_id"] ?>)" id = "delete<?= $question["q_id"] ?>"> delete</a> 		
		</td>
	</tr>
	<?php } ?>
</table>

</div>	



<?php
	include("./Footer.php");
?>
