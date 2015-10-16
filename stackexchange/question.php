<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple StackExchange</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script>
function updateVote(vote,qid,aid) {
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {  // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById(aid).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","vote.php?vote="+vote+"&qid="+qid+"&aid="+aid,true);
  xmlhttp.send();
}

</script>
</head>

<body>
<script type='text/javascript'>
	function ConfirmDelete(id){
    	var x = confirm("Are you sure you want to delete?");
      	if(x){
      	
      }
	}
</script> 
<?php
	$connect = mysql_connect("localhost","root","") or die ("Connection Error");
	$selectdb = mysql_select_db("stackexchange", $connect);
	$qid = $_GET["id"];
	$query = mysql_query("SELECT * FROM `question` where `id_question`='$qid'",$connect);
	$question = mysql_fetch_array($query);


	echo'<a href="index.php"><h1> Simple StackExchange </h1></a>';
	
	echo
		'<div id="container">
		<div class="container-title"><h2>'.$question[4].'</h2></div>
		
		<table class ="question">
			<tr>
				<td rowspan = 2 class="td-vote-answer">
					<div class="triangle-up" onclick="updateVote(1,'.$qid.',0)"></div>
					<div class="score" id="0">'.$question[6].'</div>
					<div class="triangle-down" onclick="updateVote(-1,'.$qid.',0)"></div></td>
				<td class="td-content">'.nl2br($question[5]).'<p></p></td>
			</tr>
			<tr>
				<td class="td-detail">asked by <span class="username">'.$question[3].'</span> at '.$question[1].' | <a href="edit.php?id='.$qid.'"><span class="edit"> Edit </span></a> | <a onclick="return ConfirmDelete();" href="delete.php?id='.$qid.'"><span class="delete"> Delete </span></a></td>
			</tr>
		</table>
	';

	$answers = mysql_query("SELECT * FROM `answer` WHERE `id_question`='$qid' ORDER BY `votes` DESC",$connect);
	$countanswer = mysql_num_rows($answers);
	echo '<div class="container-title"><h2>'.$countanswer.' Answer';
	if ($countanswer > 1){
		echo 's';
	}
	echo'</h2></div>';
	if ($countanswer != 0){
		while($row = mysql_fetch_array($answers)){
			echo '<table class=answer>';
				echo '<tr>';
					echo '<td rowspan="3" class="td-vote-answer">';
						echo '<div class="triangle-up" onclick="updateVote(1,'.$qid.','.$row[1].')"></div>';
						echo '<div class="score" id="'.$row[1].'">'.$row[6].'</div>';
						echo '<div class="triangle-down" onclick="updateVote(-1,'.$qid.','.$row[1].')"></div>';
					echo '</td>';
					echo '<td class="td-content">';
						echo nl2br($row[5]).'<p></p>';
					echo '</td>';
					echo '</tr>';
					
					echo '<tr>';
					echo '<td class="td-detail">';
						echo ('answered by <span class="username">'.$row[4].'</span> at '.$row[2]);
					echo '</td>';
					echo '</tr>';
				echo '</table>';
		}
		echo '<div class="container-title"></div>';
	}
	
?>

   
    <form class="form-wrapper" action="" method="post" name="answer" onsubmit="return validateForm()">
    <p class="your-answer">Your Answer</p>
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email">
        <textarea name="content" placeholder="Content"></textarea>
        <button type="submit" name="submit"> Post </button>
    </form>
	</div>
    
<script type="text/javascript">

function validateForm() {
    var name = document.forms["answer"]["name"].value;
	var email = document.forms["answer"]["email"].value;
	var content = document.forms["answer"]["content"].value;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
    if (name == null || name == "" || email == null || email == "" || content == null || content == "") {
        alert("All fields are required. Please complete the form.");
        return false;
    }
	else if (!filter.test(email)) {
    	alert('Please provide a valid email address');
    	return false;
	}
}
</script>

<?php
if (array_key_exists('submit',$_POST)){
$name = $_POST['name'];
$email = $_POST['email'];
$topic = $_POST['topic'];
$newanswer = $_POST['content'];
$countanswer++;

mysql_query ("INSERT INTO `answer`(`id_question`,`id_answer`,`name`, `email`, `answer_content`, `votes`) VALUES ('$qid','$countanswer','$name','$email','$newanswer','0')",$connect);

header("Location: question.php?id=".$qid);
}
mysql_close($connect);

?>
</body>
</html>


