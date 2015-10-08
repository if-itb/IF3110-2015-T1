<?php
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <script type = "text/javascript" src="Assets/Validator.js"></script>
    <link rel ="stylesheet" type="text/css" href="Assets/Index.css">
    <title>Simple StackExchange</title>

</head>

<body>
<div id = "container">
    <div id  = "header">
        <a id  = "logo" href = "index.php"> Simple StackExchange </a>
    </div>
    <div id = "content">
        <?php require 'ShowAnswers.php'?>
        <h1>Your Answer</h1>
        <form name ="q_form" action="Data_Manipulation/adding_answer.php" onsubmit="return validate_AForm()" method = "post">
            <input type = "text" name = "name" placeholder = "Name"/>
            <input type = "text" name = "email" placeholder = "Email"/>
            <input type = "hidden" name = "A_ID" value = "<?php echo $id;?>">
            <textarea name = "content" placeholder = "Content"></textarea>
            <input class = "button" id="button_post" type = "submit" value="Post"/>
        </form>
    </div>
    <div id = "footer">

    </div>
</div>
<body>