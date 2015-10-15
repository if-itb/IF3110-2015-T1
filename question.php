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
        <link rel="stylesheet" type="text/css" href="./css/style.css">
    </head>
    <body>
        <a href="index.php"><h1>Bukan StackExchange</h1></a>
            <?php if (count($questions) === 0) : ?>
                <div> There is no question with ID <?php echo $_GET['id'] ?> , you will be automatically redirected to home. </div>
                <script type="text/javascript">
                    window.location = "./index.php";
                </script>
            <?php endif ?>
                
            <?php foreach ($questions as $question) : ?>
                <h2> <?php echo $question['topic'] ?> </h2>
                <hr>  
                <div class="question">
                    <div class='float_left' id="voting">
                        <a href="javascript:vote(<?php echo $question['question_id'] ?>, 'question', 'up')"><img src="./img/arrow492.png" width="32" height="32"></a> <br>
                        <div class="vote_num" id="qvote"> <?php echo $question['vote'] ?> </div>
                        <a href="javascript:vote(<?php echo $question['question_id'] ?>, 'question', 'down')"><img src="./img/arrow486.png" width="32" height="32"></a>
                    </div>
                
                    <div class="content" id="q_content"> <?php echo $question['content'] ?> </div>           
                
                    <div id="asked_q">
                        asked by <span id="name"><?php echo $question['name'] ?> (<?php echo $question['email'] ?>)</span> 
                        at <?php echo $question['time'] ?> |
                        <a id="edit" href="edit.php?id=<?php echo $question['question_id'] ?>"> edit </a> | 
                    <a id="delete" href="delete.php?id=<?php echo $question['question_id'] ?>"> delete </a>
                </div>
                </div>
            <?php endforeach; ?>
            
            <div id="answercount"> <h2> <?php echo $question['answer_count'] ?> Answer </div>
        
        
        <?php if (count($answers) === 0) : ?>
        <hr>
        <p> There is no answer yet, be the first to answer! </p>      
        <?php endif ?>
        
        <div>                
            <?php foreach ($answers as $answer) : ?>
            <hr>
            <div class="float_left" id="voting">
                <div><a href="javascript:vote(<?php echo $answer['answer_id'] ?>, 'answer', 'up')"><img src="./img/arrow492.png" width="32" height="32"></a></div>
                <div class="vote_num" id="avote<?php echo $answer['answer_id'] ?>"> <?php echo $answer['vote'] ?> </div>
                <div><a href="javascript:vote(<?php echo $answer['answer_id'] ?>, 'answer', 'down')"><img src="./img/arrow486.png" width="32" height="32"></a></div>
            </div>    
                
                <div  class="content" id="q_content"><?php echo $answer['content'] ?> </div>
            
                <div id="asked">
                    answered by <span id="name"><?php echo $answer['name'] ?> (<?php echo $answer['email'] ?>)</span> 
                    at <?php echo $question['time'] ?>
                </div>
            <?php endforeach; ?>
        </div>
        
        <hr>
        <div id="form">
            <h2 id="youranswer">Your Answer</h2>
            <form name="answer" action="./mysql/post_answer.php" onsubmit="return validateAnswerForm('answer')" method="post">
                <input type="text" name="Name" onfocus="if (this.value=='Name') this.value = ''" onblur="if (this.value=='') this.value = 'Name'" value="Name"><br>
                <input type="text" name="Email" onfocus="if (this.value=='E-mail') this.value = ''" onblur="if (this.value=='') this.value = 'E-mail'" value="E-mail"><br>
                <textarea onfocus="if (this.value=='Content') this.value = ''" onblur="if (this.value=='') this.value = 'Content'" value="Content" name="Content">Content</textarea><br>
                <input type="hidden" name="Question_ID" value="<?php echo $_GET['id'] ?>">
                <input type="submit" value="Post">
            </form>
        </div>
        <?php
        
        ?>
    </body>
</html>
