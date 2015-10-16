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
?>

<a href="index.php"><h1> Simple StackExchange </h1></a>

<div id="container">
<div class="container-title">
<h2> What's your question? </h2>
</div>
<form name="ask" class="form-wrapper" action="" method="post"  onsubmit="return validateForm()">
	<input type="text" name="name" placeholder="Name" value=<?php echo '"'.$question[2].'"' ?>>
	<input type="text" name="email" placeholder="Email" value=<?php echo '"'.$question[3].'"' ?>>
    <input type="text" name="topic" placeholder="Question Topic" value=<?php echo '"'.$question[4].'"' ?>>
    <textarea name="content" placeholder="Content"><?php echo $question[5] ?></textarea>
	<button type="submit" name="submit"> Update </button>
</form>

</div>
<script type="text/javascript">
function validateForm() {
    var name = document.forms["ask"]["name"].value;
	var email = document.forms["ask"]["email"].value;
	var topic = document.forms["ask"]["topic"].value;
	var content = document.forms["ask"]["content"].value;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
    if (name == null || name == "" || email == null || email == "" || topic == null || topic == "" || content == null || content == "") {
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
$question = $_POST['content'];


mysql_query ("UPDATE `question` SET `name`='$name', `email`='$email', `topic`='$topic', `question_content`='$question' WHERE `id_question`='$qid'",$connect);

$id = mysql_insert_id();

header("Location: question.php?id=".$qid);
}
mysql_close($connect);

?>
</body>
</html>


