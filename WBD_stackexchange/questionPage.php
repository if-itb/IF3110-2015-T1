<?php
    $questionId = $_GET['questionId'];
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> Simple StackExchange</title>
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

            </div>
        </div>

    </div>
</body>



</html>