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
echo "<div class='questionAnswerItem''>";
    echo"<span class='questionAnswerHeader'>$title</span>";

    echo"<div class ='questionAnswerBody'>";
        echo"<div class ='questionAnswerVote'>";
            echo"<div class='questionAnswerVoteUpArrow'>";
                echo "panah atas";
            echo"</div>";
            echo"<div class='questionAnswerVoteNumber'>";
                echo "$vote";
            echo"</div>";
            echo"<div class='questionAnswerVoteDownArrow'>";
                echo "panah bawah";
            echo"</div>";
        echo"</div>";

        echo"<div class ='questionAnswerContent'>";
            echo"$content";
        echo"</div>";
    echo"</div>";

    echo"<span class='questionFooter'>asked by $name at $date|edit|delete</span>";
echo "</div>";




// Close the database connection
  mysql_close();
?>

