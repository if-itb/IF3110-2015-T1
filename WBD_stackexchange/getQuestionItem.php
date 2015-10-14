<script type="text/javascript" src="voteXmlHttp.js"></script>



<?php
/**
 * Created by PhpStorm.
 * User: Marco Orlando
 * Date: 10/9/2015
 * Time: 10:55 PM
 */

$username = 'root';
$password = '';
$database = 'WBD1';
mysql_connect('localhost', $username, $password);
@mysql_select_db($database) or die("Unable to Select Database");

// SQL query
$strSQL = "SELECT * FROM Questions WHERE questionId=$questionId";
// Execute the query (the recordset $rs contains the result)
$rs = mysql_query($strSQL);

// Loop the recordset $rs
// Each row will be made into an array ($row) using mysql_fetch_array
while($row = mysql_fetch_array($rs)) {
    // Write the value of the column FirstName (which is now in the array $row)
    $name = $row['name'];
    $title = $row['title'];
    $vote = $row['vote'];
    $questionId = $row['questionId'];
    $content=$row['content'];
    $date=$row['date'];
}
echo "<div class='questionB'>";
    echo"<span class='questionAnswerHeader'>$title</span>";

    echo"<div class ='questionAnswerBody'>";
        echo"<div class ='questionAnswerVote'>";
            echo"<div class='questionAnswerVoteUpArrow' onclick= \"voteUpdate('question',$questionId, 'up')\">";
                echo "<img src='icons/upArrow.png' width='30' height='30'>";
            echo"</div>";
            echo"<div class='questionAnswerVoteNumber' id='voteQuestion'>";
                echo "$vote";
            echo"</div>";
            echo"<div class='questionAnswerVoteDownArrow' onclick= \"voteUpdate('question',$questionId, 'down')\" >";
                echo "<img src='icons/downArrow.png' width='30' height='30'>";
            echo"</div>";
        echo"</div>";

        echo"<div class ='questionAnswerContent'>";
            echo"$content";
        echo"</div>";
    echo"</div>";

    echo"<span class='questionAnswerFooter'>asked by $name at $date|<a class='editQuestion' href='addQuestion.php?questionId=$questionId'><font color='green'>edit</font> </a>|<a class='deleteQuestion' href = 'deleteQuestion.php?questionId=$questionId' onclick= \"return confirm('Confirm Delete?');\";><font color='red'>delete</font> </a></span>";
echo "</div>";




// Close the database connection
  mysql_close();
?>

