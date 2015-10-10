<?php
require_once("./sql/mysql.php");
?>

<?php
    $db = new mysqli('localhost','root','','StackExchange')
?>

<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type="text/css" href="css/style.css">
    <h1> Simple Stack Exchange </h1>
</head>
    <div class="search">
        <div class="container">
            <form action="index.php" method="GET">
                <input type="text"  id="search" placeholder="Search question topic or content here...">
                <input type="image" src="img/search.png" id="submit">
            </form>
        </div>
        <p class="cannot">Cannot find what you are looking for? <a href="ask.php" >Ask here</a></p>
    </div>

<div class="question_list">
    <h3>Recently Asked Questions</h3>
    <?php
        $q = "SELECT * from question";
        if(!$result = $db -> query($q)){
            die('Error Query ['.$db -> error. ']');
        }
        while($row = $result->fetch_assoc()){
            echo '<div class="question">';
            echo '<hr>';
            echo '<div>';
            echo '<table>';
            echo '<tr>';
            echo '<td class="td">'.$row['vote'].'<br>Votes</td>';
            echo '<td class="td">0<br>Answers</td>';
            echo '<td class="row"><a href="question.php?id='.$row['id'].'">'.$row['topic'].'</a></td>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
            echo '<div class="creator">asked by <span class="creator_name">'.$row['name'].'</span> | <a href="ask.php?id='.$row['id'].'" class="creator_edit">edit </a> | <a href="index.php?id='.$row['id'].'" class="creator_delete">delete</a>';
            echo '</div>';
            echo '</div>';
        }
    ?>

</div>
</html>

<?php
$db->close();
?>


