<?php
    $questionId = $_GET['questionId'];
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> Simple StackExchange</title>
    <script type = "text/javascript" src="validatorInputQuestionAnswer.js"></script>
</head>

<body>
    <div id="container">
        <div id="header">
            <span id="Judul">Simple StackExchange</span>
        </div>

        <div id="body">
            <div id="questionAndAnswer">
                <?php
                require"getQuestionItem.php";
                require"getQuestionAnswer.php";
                ?>
            </div>


            <div id="yourAnswer">
                <span id="yourAnswerWord">Your Answer</span>
                <div id="answerForm">
                    <form name="myForm" action="addAnswerToDB.php" method="post" onsubmit="return validateFormAnswer()">
                        <input type="text" name="name" placeholder="Name"><br>
                        <input type="text" name="email" placeholder="Email"><br>
                        <textarea name="questionContent" placeholder="Content"></textarea><br>
                        <div id="submitter">
                             <input type="submit" value="Post">
                        </div>
                        <input type="hidden" name="questionId" value="<?php echo $questionId;?>">
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>



</html>