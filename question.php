<?php
	require_once("./mysql/retrieve_one_question.php");
        
        $questions = retrieveOneQuestion($_GET['id']);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bukan StackExchange - </title>
        <script src="./js/form_validation.js"></script>
    </head>
    <body>
        <div align="center">
            <h1>Bukan StackExchange</h1>
        </div>
        <div>
            <?php if (count($questions) === 0) : ?>
                <div> There is no question with ID ... , you will be automatically redirected to home. </div>
                <script type="text/javascript">
                    window.location = "./index.php";
                </script>
            <?php endif ?>
                
            <?php foreach ($questions as $question) :
                echo $question['question_id'] . "<br>";
                echo $question['name'] . "<br>";
                echo $question['email'] . "<br>";
                ?>
                <a href="question.php?id=<?php echo $question['question_id'] ?>">
                    <?php echo $question['topic'] . "<br>" ?>
                </a>
                <?php  
                    echo $question['content'] . "<br>";
                    echo $question['vote'] . "<br>";
                    echo $question['time'] . "<br>";
                ?>
                <a href="ask.php?id=<?php echo $question['question_id'] ?>">
                    Edit | 
                </a>
                <a href="delete.php?id=<?php echo $question['question_id'] ?>">
                    Delete
                </a>
                <br><br>
            <?php endforeach; ?>
        </div>
        <div>
            <form name="answer" action="./mysql/post_answer.php" onsubmit="return validateAnswerForm('answer')" method="post">
                <input type="text" name="Name"><br>
                <input type="text" name="Email"><br>
                <input type="text" name="Content"><br>
                <input type="hidden" name="Question_ID" value="<?php echo $_GET['id'] ?>">
                <input type="submit" value="Post">
            </form>
        </div>
        <?php
        
        ?>
    </body>
</html>
