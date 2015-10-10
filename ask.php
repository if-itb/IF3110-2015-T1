<?php
require_once("./sql/mysql.php");
?>

<?php
$db = new mysqli('localhost','root','','StackExchange');
$id = isset($_GET['id']) ? $_GET['id'] : '';
if($id != ''){
    $q = "SELECT * from question where id=$id ";
    if(!$result = $db -> query($q)){
        die('Error Query ['.$db -> error. ']');
    }
    else{
        $row = $result->fetch_assoc();
    }
}
else{
    $row['name'] = '';
    $row['email'] = '';
    $row['topic'] = '';
    $row['content'] = '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type="text/css" href="css/style.css">
    <h2>What's your question?</h2>
</head>
<hr>
<form action="index.php" method="POST" class="block" name="questionform">
    <input type="text" placeholder="Name" name="name" id="namebox" value="<?php echo $row['name']?>" />
    <input type="text" placeholder="Email" name="email" id="emailbox" value="<?php echo $row['email']?>" />
    <input type="text" placeholder="Question Topic" name="topic" id="topicbox" value="<?php echo $row['topic']?>"/>
    <textarea name="content" placeholder="Content" id="contentbox"><?php echo $row['content']?></textarea>
    <input type="submit" value="Post" name="Submit" id="submit"/>
    <input type="hidden" name="type" value="question" />
    <input type="hidden" name="id" value="<?php echo $id ?>"  />
</form>
</html>

<?php
$db->close();
?>
