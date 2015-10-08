<?php
    require 'ConnectDatabase.php';
    $query = "SELECT * FROM questions WHERE ID=$id";
    $result = mysql_query($query);
    $topic = mysql_result($result,0,'topic');
    $content = mysql_result($result,0,'content');
    $author = mysql_result($result,0,'author');
    $vote = mysql_result($result,0,'vote');
    echo"<h3>$topic</h3>";
    echo "<div class = 'q_details'>";
    echo"<div class = 'a_left'>";
    echo"<span class = 'vote'>$vote<br>Votes</span>";
    echo"</div>";
    echo"<div class = 'a_mid'>";
    echo"<div class = 'a_content'>$content</div></div>";
    echo"<div class = 'details'>Asked by <span class = 'b_link'>$author </span>|
                <a href = 'AskQuestion.php?id=$id' class = 'y_link'> edit </a>|
                <a href='Data_Manipulation/DeleteQuestion.php?id=$id' class = 'r_link' onclick= \"return confirm('Are You Sure?');\">delete</a>";
    echo "</div>";
    $query = "SELECT * FROM answers WHERE A_ID=$id";
    $result = mysql_query($query);
    $num = mysql_num_rows($result);
    $i = 0;
    echo"<h3>$num Answer</h3>";
    while($i<$num){
        $content = mysql_result($result, $i,"content");
        $email = mysql_result($result, $i,"email");
        $vote = mysql_result($result,$i,"vote");
        echo "<div class = 'q_or_a'>";
        echo"<div class = 'a_left'>";
        echo"<span class = 'vote'>$vote<br>Votes</span>";
        echo"</div>";
        echo"<div class = 'a_mid'>";
        echo"<div class = 'a_content'>$content</div></div>";
        echo"<div class = 'details'>Answered by <span class = 'b_link'>$email<br></div>";
        echo "</div>";
        $i++;
    }
    mysql_close();
?>