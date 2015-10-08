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
            <p>Cannot find what you are looking for?<a class="orange_link" href="create_question.php">Ask here</a></p>        
        </div>

        <div id="content">
            <p class="content_title" id="recently">Recently Asked Questions</p>
            <?php
                echo "Hellow World";
                foreach($questions as $question){
                    $left = "<div class='left'>
                                <span class='vote'>0<br>Votes</span>
                                <span class='answer'>0<br>Answers</span>
                            </div>";

                    $middle = " <div class='middle'>
                                    <a href=''>". $question['topic'] ."</a>
                                    <p>BLAbajfhajkhfdsj</p>
                                </div>";

                    $right = " <div class='right'>
                                asked by 
                                <a class='blue_link' href=''>" . $question['name'] ."</a> | 
                                <a class='orange_link' href=''>edit</a> |
                                <a class='red_link' href=''>delete</a>
                               </div>";

                    $question_content = "<div class='question'>". $left . $middle . $right . "</div>";

                    echo $question_content;
                } 


            ?>
        </div>

        <div id="footer">

        </div>

    </div>
</body>

    <script type="text/javascript" src="/js/script.js"></script>
</html>
