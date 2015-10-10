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
        <?php
            //if($exist=='true'){
                require 'ShowAnswers.php';
                echo"<h1>Your Answer</h1>
                <form name ='q_form' action='Data/adding_answer.php' onsubmit='return validate_AForm()' method = 'post'>
                    <input type = 'text' name = 'name' placeholder = 'Name'/>
                    <input type = 'text' name = 'email' placeholder = 'Email'/>
                    <input type = 'hidden' name = 'A_ID' value = '$id'>
                    <textarea name = 'content' placeholder = 'Content'></textarea>
                    <input class = 'button' id='button_post' type = 'submit' value='Post'/>
                </form>";
            //}
            /*else{
                echo"<p>We are sorry. But the page you requested doesn't exist in our database<p>";
            }*/
        ?>

    </div>
    <div id = "footer">

    </div>
</div>
<body>