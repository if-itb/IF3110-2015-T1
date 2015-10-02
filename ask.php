<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bukan StackExchange - Ask</title>
    </head>
    <body>
        <div align="center">
            <h1>Bukan StackExchange</h1>
        </div>
        <div>
            <h2>What's your question?</h2>
        </div>
        <div>
            <form action="post_question.php">
                <input type="text" name="name" value="Name"><br>
                <input type="text" name="email" value="Email"><br>
                <input type="text" name="topic" value="Question Topic"><br>
                <input type="text" name="content" value="Content"><br>
                <input type="submit" value="Post">
            </form>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
