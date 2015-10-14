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
            <p>Cannot find what you are looking for?<a class="orange_link" href="create_question.php"> Ask here</a></p>        
        </div>

        <div id="content">
            <p class="content_title" id="recently">Recently Asked Questions</p>
            <?php
                $size = sizeof($questions);
                $i = 0;
                foreach($questions as $question){
                    $question_content = $question['content'];
                    if (strlen($question_content) > 100 ){
                        $question_content = substr($question_content,0,96)." ...";
                    }
                    
                    $answer_count = getAnswerCount($question['q_id']);

                    $left = "<div class='left'>
                                <span class='vote'>".$question['vote']."<br>Votes</span>
                                <span class='answer'>".$answer_count."<br>Answers</span>
                            </div>";
                    $middle = " <div class='middle'>
                                    <a href='show_question.php?id=". $question['q_id']."'>". $question['topic'] ."</a>
                                    <p>".$question_content."</p>
                                </div>";

                    $right = " <div class='right'>
                                asked by 
                                <a class='blue_link' href=''>" . $question['name'] ."</a> | 
                                <a class='orange_link' href='create_question.php?id=". $question['q_id'] . "'>edit</a> |
                                <a class='red_link-".$question['q_id']."' href='' onclick ='return deleteConfirmation(".$question['q_id'].")' >delete</a>
                               </div>";

                    if ($i < $size - 1){
                        $question_content_all = "<div class='question'>". $left . $middle . $right . "</div>";
                    }
                    else{
                        $question_content_all = "<div class='question_last'>". $left . $middle . $right . "</div>";
                    }

                    $i++;

                    echo $question_content_all;
                } 


            ?>
        </div>

        <div id="footer">

        </div>

    </div>
</body>

</html>
