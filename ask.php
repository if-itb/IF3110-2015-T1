<?php
require_once("./sql/mysql.php");
$id = isset($_GET['id']) ? $_GET['id'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type="text/css" href="css/style.css">
    <h2>What's your question?</h2>
</head>
<hr>
<form action="index.php" method="POST" class="block" name="questionform">
    <input type="text" placeholder="Name" name="name" id="namebox" />
    <input type="text" placeholder="Email" name="email" id="emailbox"  />
    <input type="text" placeholder="Question Topic" name="topic" id="topicbox" />
    <textarea name="content" placeholder="Content" id="contentbox"></textarea>
    <input type="submit" value="Post" name="Submit" id="submit"/>
    <input type="hidden" name="type" value="ask" />
    <input type="hidden" name="id" value="<?php echo $id ?>"  />
</form>
</html>