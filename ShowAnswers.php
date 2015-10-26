<script type="text/javascript" src="Assets/js/vote.js"></script>
<script type="text/javascript" src='Assets/js/Confirmation.js'></script>

<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    require 'Data/ConnectDatabase.php';
    $query = "SELECT * FROM questions WHERE ID=$id";
    $result = mysql_query($query);
    $num = mysql_num_rows($result);
    if($num==0){
        $exist = false;
    }
    else {
        $exist = true;
        $topic = mysql_result($result, 0, 'topic');
        $content = mysql_result($result, 0, 'content');
        $author = mysql_result($result, 0, 'author');
        $vote = mysql_result($result, 0, 'vote');
        echo "<h3>$topic</h3>";
        echo "<div class = 'q_details'>";
        echo "<div class = 'only_q'>";
        echo "<div class = 'a_left'>";
        echo "<div class = 'vote_buttons'>";
        echo "<div class='up_button' onclick='VoteUp(true,$id)'><img src='Assets/images/up.png' width='30' height='30'></div>";
        echo "<div class = 'vote' id='q_vote'>$vote</div>";
        echo "<div class='down_button' onclick='VoteDown(true,$id)'><img src='Assets/images/down.png' width='30' height='30'></div>";
        echo "</div>
        </div>";
        echo "<div class = 'a_mid'>";
        echo "<div class = 'a_content'>$content</div></div>";
        echo "</div>";
        echo "<div class = 'details'>Asked by <span class = 'b_link'>$author </span>|
                <a href = 'AskQuestion.php?id=$id' class = 'y_link'> edit </a>|
                <a href='Data/DeleteQuestion.php?id=$id' class = 'r_link' onclick= \"return confirm('Are You Sure?');\">delete</a>";
        echo "</div>";
        $query = "SELECT * FROM answers WHERE A_ID=$id";
        $result = mysql_query($query);
        $num = mysql_num_rows($result);
        $i = 0;
        echo "<h3>$num Answer</h3>";
        while ($i < $num) {
            $content = mysql_result($result, $i, "content");
            $email = mysql_result($result, $i, "email");
            $vote = mysql_result($result, $i, "vote");
            $id = mysql_result($result, $i, "id");
            echo "<div class = 'q_or_a'>";
            echo "<div class = 'a_left'>";
            echo "<div class='up_button' onclick='VoteUp(false,$id)'><img src='Assets/images/up.png' width='30' height='30'></div>";
            echo "<div class = 'vote' id='vote$id'>$vote</div>";
            echo "<div class='down_button' onclick= 'VoteDown(false,$id)'><img src='Assets/images/down.png' width='30' height='30'></div>";
            echo "</div>";
            echo "<div class = 'a_mid'>";
            echo "<div class = 'a_content'>$content</div></div>";
            echo "</div>";
            echo "<div class = 'details'>Answered by <span class = 'b_link'>$email</div>";
            $i++;
        }
    }
    mysql_close();
?>