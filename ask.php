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
<script type="text/javascript">
    function validateQuestionForm() {
        var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (document.forms["questionform"]["name"].value == null || document.forms["questionform"]["name"].value == "" ||
            document.forms["questionform"]["email"].value == null || document.forms["questionform"]["email"].value == "" ||
            document.forms["questionform"]["topic"].value == null || document.forms["questionform"]["topic"].value == "" ||
            document.forms["questionform"]["content"].value == null || document.forms["questionform"]["content"].value == "") {
            alert("All required fields must be filled out");
            return false;
        }
        else if(!re.test(document.forms["questionform"]["email"].value)){
            alert("Incorrect email address");
            return false;
        }

    }
</script>

<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type="text/css" href="css/style.css">
    <h2>What's your question?</h2>
</head>
<hr>
<form action="index.php" method="POST" class="block" name="questionform" onsubmit="return validateQuestionForm()">
    <input type="text" placeholder="Name" name="name" id="namebox" value="<?php echo $row['name']?>" />
    <input type="text" placeholder="Email" name="email" id="emailbox" value="<?php echo $row['email']?>" />
    <input type="text" placeholder="Question Topic" name="topic" id="topicbox" value="<?php echo $row['topic']?>"/>
    <textarea name="content" placeholder="Content" id="contentbox"><?php echo $row['content']?></textarea>
    <input type="submit" value="Post" name="Submit" id="submit"/>
    <input type="hidden" name="type" value="question_input" />
    <input type="hidden" name="ask_id" value="<?php echo $id ?>"  />
</form>
</html>

<?php
$db->close();
?>
