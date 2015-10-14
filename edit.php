<?php
	require_once("./mysql/retrieve_qa.php");
        $questions = retrieveOneQuestion($_GET['id']);
        $answers = retrieveAnswers($_GET['id']);
        
        foreach ($questions as $question) :
            $name = $question['name'];
            $email = $question['email'];
            $topic = $question['topic'];
            $content = $question['content'];
        endforeach;
?>
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
                <input type="text" name="Name" value="<?php echo $name ?>"><br>
                <input type="text" name="Email" value="<?php echo $email ?>"><br>
                <input type="text" name="Topic" value="<?php echo $topic ?>"><br>
                <input type="text" name="Content" value="<?php echo $content ?>"><br>
                <input type="hidden" name="Question_ID" value="<?php echo $_GET['id'] ?>"><br>
                <input type="submit">
            </form>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
