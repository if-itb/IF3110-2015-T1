<?php
    require("./controller.php");
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $keyword = $_POST['search_keyword'];
        $questions = searchQuestion($keyword);
    }
    else{
        $questions = getQuestions();

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" type="text/css" >
    <script type="text/javascript" src="script.js"></script>

    <title>Simple StackExchange</title>
</head>
<body>
    <div id= "container">

        <div id="header">
            <p id="logo">Simple StackExchange</p>
            <form id="search" action="" method="POST">
                <input type="text" class ="searchBar" name="search_keyword">
                <input type="submit" class ="submitButton" value="Search">
            </form>
            <p>Cannot find what you are looking for?<a class="orange_link" href="create_question.php">Ask here</a></p>        
        </div>

        <div id="content">
            <p class="content_title" id="recently">Recently Asked Questions</p>
            <?php
                foreach($questions as $question){

                    $left = "<div class='left'>
                                <span class='vote'>0<br>Votes</span>
                                <span class='answer'>0<br>Answers</span>
                            </div>";
                    $middle = " <div class='middle'>
                                    <a href='show_question.php?id=". $question['q_id']."'>". $question['topic'] ."</a>
                                    <p>BLAbajfhajkhfdsj</p>
                                </div>";

                    $right = " <div class='right'>
                                asked by 
                                <a class='blue_link' href=''>" . $question['name'] ."</a> | 
                                <a class='orange_link' href='create_question.php?id=". $question['q_id'] . "'>edit</a> |
                                <a class='red_link' href='deleteQuestion.php?id=".$question['q_id']."' onclick ='return confirm(\"Are you sure to delete this question?\");' >delete</a>
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

</html>
