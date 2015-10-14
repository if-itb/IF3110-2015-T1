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
?>
<a href="index.php"><h1> Simple StackExchange </h1></a>

<div id="container">
<div class="container-title">
<h2> What's your question? </h2>
</div>
<form class="form-wrapper" action="" method="post">
	<input type="text" name="name" placeholder="Name" required>
	<input type="text" name="email" placeholder="Email" required>
    <input type="text" name="topic" placeholder="Question Topic" required />
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


mysql_query ("INSERT INTO `question`(`name`, `email`, `topic`, `question_content`, `votes`) VALUES ('$name','$email','$topic','$question','0')",$connect);

$id = mysql_insert_id();

header("Location: question.php?id=".$id);
}
mysql_close($connect);

?>

</html>


