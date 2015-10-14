<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple StackExchange</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
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
				<td rowspan = 2 class="td-vote-answer"> votes </td>
				<td class="td-content">'.nl2br($question[5]).'<p></p></td>
			</tr>
			<tr>
				<td class="td-detail">asked by <span class="username">'.$question[3].'</span></td>
			</tr>
		</table>
	';

	$answers = mysql_query("SELECT * FROM `answer` WHERE `id_question`='$qid' ORDER BY `votes` DESC",$connect);
	$countanswer = mysql_num_rows($answers);
	echo '<div class="container-title"><h2>'.$countanswer.' Answer</h2></div>';
	if ($answers){
		while($row = mysql_fetch_array($answers)){
			echo '<table class=answer>';
				echo '<tr>';
					echo '<td rowspan="3" class="td-vote-answer">';
						echo ('<b>'.$row[6].'</b><br>Votes');
					echo '</td>';
					echo '<td class="td-content">';
						echo nl2br($row[5]).'<p></p>';
					echo '</td>';
					echo '</tr>';
					
					echo '<tr>';
					echo '<td class="td-detail">';
						echo ('answered by <span class="username">'.$row[3].'</span>');
					echo '</td>';
					echo '</tr>';
				echo '</table>';
		}
	}
?>

    <div class="container-title"></div>
    <form class="form-wrapper" action="" method="post">
    <p class="your-answer">Your Answer</p>
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="email" placeholder="Email" required>
        <textarea name="content" placeholder="Content" required="required"></textarea>
        <button type="submit" name="submit"> Post </button>
    </form>
	</div>
</body>

<?php
if (array_key_exists('submit',$_POST)){
$name = $_POST['name'];
$email = $_POST['email'];
$topic = $_POST['topic'];
$question = $_POST['content'];
$countanswer++;

mysql_query ("INSERT INTO `answer`(`id_question`,`id_answer`,`name`, `email`, `answer_content`, `votes`) VALUES ('$qid','$countanswer','$name','$email','$question','0')",$connect);

header("Location: question.php?id=".$qid);
}
mysql_close($connect);

?>

</html>


