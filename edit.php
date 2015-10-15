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
        <title>Edit question - Bukan StackExchange</title>
        <script src="./js/form_validation.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
    </head>
    <body>
        <a href="index.php"><h1>Bukan StackExchange</h1></a>        
        <div id="form">            
            <h2>Edit your question</h2>
            <hr>
            <form name="edit_q" action="./mysql/edit_question.php" onsubmit="return validateQuestionForm('edit_q')" method="post">
                <input type="text" name="Name" value="<?php echo $name ?>"><br>
                <input type="text" name="Email" value="<?php echo $email ?>"><br>
                <input type="text" name="Topic" value="<?php echo $topic ?>"><br>
                <textarea name="Content"><?php echo $content ?></textarea><br>                
                <input type="hidden" name="Question_ID" value="<?php echo $_GET['id'] ?>">
                <input type="submit" value="Post">
            </form>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
