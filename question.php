<?php
	require_once("./mysql/retrieve_qa.php");
        $questions = retrieveOneQuestion($_GET['id']);
        $answers = retrieveAnswers($_GET['id']);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bukan StackExchange - Question</title>
        <script src="./js/form_validation.js"></script>
        <script src="./ajax/vote.js"></script>
    </head>
    <body>
        <div align="center">
            <a href="index.php"><h1>Bukan StackExchange</h1></a>
        </div>
        <div>
            <?php if (count($questions) === 0) : ?>
                <div> There is no question with ID ... , you will be automatically redirected to home. </div>
                <script type="text/javascript">
                    window.location = "./index.php";
                </script>
            <?php endif ?>
                
            <?php foreach ($questions as $question) :
                echo $question['name'] . "<br>";
                echo $question['email'] . "<br>";
                ?>
                <a href="question.php?id=<?php echo $question['question_id'] ?>">
                    <?php echo $question['topic'] . "<br>" ?>
                </a>
                <?php  
                    echo $question['content'] . "<br>";
                ?>
                    <div id="qvote"> <?php echo $question['vote'] ?> </div>
                    <div><a href="javascript:vote(<?php echo $question['question_id'] ?>, 'question', 'up')"><img src="./img/arrow492.png" width="32" height="32"></a></div>
                    <div><a href="javascript:vote(<?php echo $question['question_id'] ?>, 'question', 'down')"><img src="./img/arrow486.png" width="32" height="32"></a></div>
                <?php                
                    echo $question['answer_count'] . "<br>";
                    echo $question['time'] . "<br>";
                ?>
                <a href="edit.php?id=<?php echo $question['question_id'] ?>">
                    Edit | 
                </a>
                <a href="delete.php?id=<?php echo $question['question_id'] ?>">
                    Delete
                </a>
                <br><br>
            <?php endforeach; ?>
        </div>
        
        <div>
            <?php if (count($answers) === 0) : ?>
                <div> There is no answer yet. Be the first to answer! </div>
            <?php endif ?>
                
            <?php foreach ($answers as $answer) :
                echo $answer['name'] . "<br>";
                echo $answer['email'] . "<br>";        
                echo $answer['content'] . "<br>";
             ?>
                <div id="avote<?php echo $answer['answer_id'] ?>"> <?php echo $answer['vote'] ?> </div>
                <div><a href="javascript:vote(<?php echo $answer['answer_id'] ?>, 'answer', 'up')"><img src="./img/arrow492.png" width="32" height="32"></a></div>
                <div><a href="javascript:vote(<?php echo $answer['answer_id'] ?>, 'answer', 'down')"><img src="./img/arrow486.png" width="32" height="32"></a></div>
            <?php   
                echo $answer['time'] . "<br><br>";
            endforeach; ?>
        </div>
        
        <div>
            <form name="answer" action="./mysql/post_answer.php" onsubmit="return validateAnswerForm('answer')" method="post">
                <input type="text" name="Name" onfocus="if (this.value=='Name') this.value = ''" onblur="if (this.value=='') this.value = 'Name'" value="Name"><br>
                <input type="text" name="Email" onfocus="if (this.value=='E-mail') this.value = ''" onblur="if (this.value=='') this.value = 'E-mail'" value="E-mail"><br>
                <input type="text" name="Content" onfocus="if (this.value=='Content') this.value = ''" onblur="if (this.value=='') this.value = 'Content'" value="Content"><br>
                <input type="hidden" name="Question_ID" value="<?php echo $_GET['id'] ?>">
                <input type="submit" value="Post">
            </form>
        </div>
        <?php
        
        ?>
    </body>
</html>
