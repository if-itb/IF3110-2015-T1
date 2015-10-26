<?php
    if (isset($_GET['id'])){
        require 'Data/ConnectDatabase.php';
        $update = true;
        $id = $_GET['id'];
        $query = "SELECT * FROM questions WHERE ID = $id";
        $result = mysql_query($query);
        $topic = mysql_result($result, 0,"topic");
        $content = mysql_result($result, 0,"content");
        $author = mysql_result($result, 0,"author");
        $email = mysql_result($result,0,"email");
        mysql_close();
    }
    else{
        $id = 0;
        $update = false;
        $topic = "";
        $content = "";
        $author = "";
        $email = "";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <script type = "text/javascript" src="Assets/js/Validator.js"></script>
    <link rel ="stylesheet" type="text/css" href="Assets/css/Index.css">
    <title>Simple StackExchange</title>

</head>

<body>
<div id = "container">
    <div id  = "header">
        <a id  = "logo" href = "index.php"> Simple StackExchange </a>
    </div>
    <div id = "content">
        <h2>What's Your Question?</h2>
        <form name = "q_form" action="Data/adding_question.php" onsubmit="return validate_QForm()" method = "post">
            <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
            <input type = "hidden" name = "update" value = "<?php echo $update; ?>">
            <input type = "text" name = "name" placeholder = "Name" value = "<?php echo $author; ?>">
            <input type = "text" name = "email" placeholder = "Email"value = "<?php echo $email; ?>">
            <input type = "text" name = "topic" placeholder ="Question Topic" value = "<?php echo $topic; ?>">
            <textarea name = "content" placeholder = "Content" ><?php echo $content; ?></textarea>
            <input class = "button" id="button_post" type = "submit" value=<?php if($update){echo "Update";}else{echo "Post";}?>>
        </form>
    </div>
    <div id = "footer">

    </div>
</div>
<body>