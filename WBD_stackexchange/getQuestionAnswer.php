<?php
/**
 * Created by PhpStorm.
 * User: Marco Orlando
 * Date: 10/9/2015
 * Time: 11:28 PM
 */


$username = 'root';
$password = '';
$database = 'WBD1';
mysql_connect('localhost', $username, $password);
@mysql_select_db($database) or die("Unable to Select Database");

// SQL query
$strSQL = "SELECT * FROM Answers WHERE question_id=$questionId";
// Execute the query (the recordset $rs contains the result)
$rs = mysql_query($strSQL);
$rowNumber= mysql_num_rows($rs);
// Loop the recordset $rs
// Each row will be made into an array ($row) using mysql_fetch_array

echo"<div id='numberAnswer'>$rowNumber Answer</div>";
echo"<div id='answerList'>";
while($row = mysql_fetch_array($rs)) {
// Write the value of the column FirstName (which is now in the array $row)
$name = $row['name'];
$vote = $row['vote'];
$questionId = $row['question_id'];
$answerId=$row['answer_id'];
$content=$row['content'];
$date=$row['date'];


    echo "<div class='answerItem''>";


    echo"<div class ='questionAnswerBody'>";
        echo"<div class ='questionAnswerVote'>";
            echo"<div class='questionAnswerVoteUpArrow' onclick= \"voteUpdate('answer',$answerId, 'up')\">";
                echo "<img src='icons/upArrow.png' width='30' height='30'>";
            echo"</div>";
            echo"<div class='questionAnswerVoteNumber' id='voteAnswer$answerId'>";
                echo "$vote";
            echo"</div>";
            echo"<div class='questionAnswerVoteDownArrow' onclick= \"voteUpdate('answer',$answerId, 'down')\">";
                echo "<img src='icons/downArrow.png' width='30' height='30'>";
            echo"</div>";
        echo"</div>";

        echo"<div class ='questionAnswerContent'>";
            echo"$content";
        echo"</div>";
    echo"</div>";

    echo"<span class='questionAnswerFooter'>answered by $name at $date</span>";
    echo "</div>";
}
echo"</div>";

// Close the database connection
mysql_close();
?>

