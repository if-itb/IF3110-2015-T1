<?php
require_once("./sql/mysql.php");
?>
<?php
$question_id = isset($_GET['question_id']) ? $_GET['question_id'] : '';

$data = $question_id != '' ? getQuestion($question_id) : array();
$data['name'] = !isset($data['name']) ? '' : $data['name'];
$data['email'] = !isset($data['email']) ? '' : $data['email'];
$data['title'] = !isset($data['title']) ? '' : $data['title'];
$data['content'] = !isset($data['content']) ? '' : $data['content'];
?>
<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type="text/css" href="css/style.css">
    <h2>What's your question?</h2>
</head>
<hr>
<form action="index.php" method="POST" class="block" onsubmit="">
    <input type="text" placeholder="Name" name="name" id="namebox" value="<?php echo $data['name'] ?>"/>
    <input type="text" placeholder="Email" name="email" id="emailbox" value="<?php echo $data['email']?>" />
    <input type="text" placeholder="Question Topic" name="title" id="topicbox" />
    <textarea name="content" placeholder="Content" id="contentbox"></textarea>
    <input type="submit" value="Post" id="submit"/>
    <input type="hidden" name="type" value="ask" />
    <input type="hidden" name="question_id"  />
</form>
</html>