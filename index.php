<?php
    require_once("./controller.php");
    $questions = getQuestions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" type="text/css" >

    <title>Simple StackExchange</title>
</head>
<body>
    <div id= "container">

        <div id="header">
            <p id="logo">Simple StackExchange</p>
            <span id="search" >
                    <input type="text" class ="searchBar">
                    <input type="submit" class ="submitButton" value="Search">
            </span>
            <p>Cannot find what you are looking for?<a class="q_createLink" href="create_question.php">Ask here</a></p>        
        </div>

        <div id="content">
            <p class="content_title" id="recently">Recently Asked Questions</p>
            <div class="question">
                <div class="left">
                    <span class="vote">Votes</span>
                    <span class="answer">Answers</span>
                </div>

                <div class="middle">
                    <a href=""></a>
                    <p></p>
                </div>

                <div class="right">
                    <div class="details">
                        Asked by 
                    </div>
                </div>

            </div>           

        </div>

        <div id="footer">

        </div>

    </div>
</body>

    <script type="text/javascript" src="/js/script.js"></script>
</html>
