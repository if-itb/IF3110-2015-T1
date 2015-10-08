<?php
    require 'ConnectDatabase.php';
    $query = "SELECT * FROM questions";
    $result = mysql_query($query);
    $num = mysql_num_rows($result);
    $i = 0;
    while($i<$num){
        $topic = mysql_result($result, $i,"topic");
        $content = mysql_result($result, $i,"content");
        $author = mysql_result($result, $i,"author");
        $vote = mysql_result($result,$i,"vote");
        $id = mysql_result($result,$i,"ID");
        $s_query = "SELECT * FROM answers WHERE A_ID = $id";
        $s_result = mysql_query($s_query);
        $num_answers = mysql_num_rows($s_result);
        echo "<div class = 'q_or_a'>";
        echo"<div class = 'left'>";
        echo"<span class = 'vote'>$vote<br>Votes</span>";
        echo"<span class = 'answer'>$num_answers<br>Answers</span>";
        echo"</div>";
        echo"<div class = 'mid'>";
        echo"<a class = 'topic' href='Question.php?id=$id'>$topic<br></a>";
        echo"<div class = 'q_content'>";
        if(strlen($content)>100){
            echo substr($content,0,97).'...';
        }
        else {
            echo $content;
        }
        echo"</div></div>";
        echo"<div class = 'details'>Asked by <span class = 'b_link'>$author </span>|
                            <a href = 'AskQuestion.php?id=$id' class = 'y_link'> edit </a>|
                            <a href='Data_Manipulation/DeleteQuestion.php?id=$id' class = 'r_link' onclick= \"return confirm('Are You Sure?');\">delete</a><br></div>";

        echo "</div>";
        $i++;
    }
    mysql_close();
?>