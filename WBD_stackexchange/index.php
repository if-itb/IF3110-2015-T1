<!--
* Created by PhpStorm.
* User: Marco Orlando
* Date: 10/4/2015
* Time: 8:50 PM
-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Simple StackExchange</title>
</head>

<body>
    <div id = "container">
        <div id = "header">
            <span id="Judul">Simple StackExchange</span>
            <div class="Search">
                <div id="bar">
                    <input class="textbox" type="text"/>
                </div>
                <div id="submitButton">
                    <input class="searchButton" type="submit" value="Search"/>
                </div>
            </div>
            <p>Cannot find what you are looking for? <a style="color:red" href="addQuestion.php">Ask here</a>
        </div>
        <div id ="body">
            <h3>Recently Asked Questions</h3>
            <?php
                // Connect to database server
                mysql_connect("localhost", "root", "") or die (mysql_error ());

                // Select database
                mysql_select_db("WBD1") or die(mysql_error());
                // SQL query
                $strSQL = "SELECT * FROM Questions";

                // Execute the query (the recordset $rs contains the result)
                $rs = mysql_query($strSQL);

                // Loop the recordset $rs
                // Each row will be made into an array ($row) using mysql_fetch_array
                while($row = mysql_fetch_array($rs)) {

                    // Write the value of the column FirstName (which is now in the array $row)
                    $name = $row['name'];
                    $title = $row['title'];
                    $content=$row['content'];
                    $vote = $row['vote'];
                    $questionId = $row['questionId'];
                    $query_2="SELECT * FROM Answers where question_id=$questionId";
                    $query_2_result= mysql_query($query_2);
                    $num_answers = mysql_num_rows($query_2_result);

                    echo "<div class = 'questionItem'>";
                        echo"<div class = questionLeft>";
                            echo"<span class = 'votes_number'>$vote<br>Votes</span>";
                            echo"<span class = 'Answers_number'>$num_answers<br>Answers</span>";
                        echo"</div>";

                        echo"<div class= questionMid>";
                            echo"<a class ='questionTitle' href='questionPage.php?questionId=$questionId'>$title<br></a>";
                            echo"<div class =questionContent>";
                                if(strlen($content)>100){
                                    echo substr($content,0,97).'...';
                                }else{
                                    echo $content;
                                }
                             echo"</div>";
                        echo"</div>";

                        echo"<div class= questionRight>";
                            echo"asked by <font color='blue'>$name</font> |<a class='editQuestion' href='addQuestion.php?questionId=$questionId'><font color='green'>edit</font> </a>|<a class='deleteQuestion' href = 'deleteQuestion.php?questionId=$questionId' onclick= \"return confirm('Confirm Delete?');\";><font color='red'>delete</font> </a>";
                        echo"</div>";

                    echo"</div>";
                }

                // Close the database connection
                mysql_close();
            ?>

        </div>

    </div>

</body>
</html>