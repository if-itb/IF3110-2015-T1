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
        <script src="form_validation.js"></script>
    </head>
    <body>
        <div align="center">
            <h1>Bukan StackExchange</h1>
        </div>
        <div>
            <h2>What's your question?</h2>
        </div>
        <div>
            <form name="question" action="post_question.php" onsubmit="return validateQuestionForm('question')" method="post">
                <input type="text" name="Name"><br>
                <input type="text" name="Email"><br>
                <input type="text" name="Topic"><br>
                <input type="text" name="Content"><br>
                <input type="submit" value="Post">
            </form>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
