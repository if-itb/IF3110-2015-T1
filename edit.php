<html>
    <head>
        <meta charset="UTF-8">
        <title>Bukan StackExchange - Edit question</title>
        <script src="./js/form_validation.js"></script>
    </head>
    <body>
        <div align="center">
            <h1>Bukan StackExchange</h1>
        </div>
        <div>
            <h2>What's your question?</h2>
        </div>
        <div>
            <form name="edit_q" action="./mysql/edit_question.php" onsubmit="return validateQuestionForm('edit_q')" method="post">
                <input type="text" name="Name"><br>
                <input type="text" name="Email"><br>
                <input type="text" name="Topic"><br>
                <input type="text" name="Content"><br>
                <input type="hidden" name="Question_ID" value="<?php echo $_GET['id'] ?>"><br>
                <input type="submit">
            </form>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
