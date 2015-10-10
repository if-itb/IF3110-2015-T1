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
	<hr>
    <?php
        $q = "SELECT * from question";
        if(!$result = $db -> query($q)){
			
            die('Error Query ['.$db -> error. ']');
        }
        while($row = $result->fetch_assoc()) : ?>
            <div class="question">
                <?php
                    $q = "SELECT COUNT(id) AS count from answer where question_id= $row[id]";
                    $rq = mysqli_query($db, $q);
                    $answer = mysqli_fetch_array($rq, MYSQLI_ASSOC)['count'];
                ?>
                <table>
                    <tr>
                        <td class="td"><?php echo $row['vote'] ?><br>Votes</td>
                        <td class="td"><?php echo $answer ?><br>Answers</td>
                        <td class="row"><a href="question.php?id=<?php echo $row['id'] ?>&type=question_answer"><?php echo $row['topic'] ?></a></td>
                    </tr>
                </table>
                <div class="creator">asked by <span class="creator_name"><?php echo $row['name']?></span> |
                    <a href="ask.php?id=<?php echo $row['id'] ?>&type=edit" class="creator_edit">edit </a> |
                    <a href="index.php?id=<?php echo $row['id'] ?>&type=delete" class="creator_delete">delete</a>
                </div>
            </div>
			<hr>
    <?php endwhile;?>
</div>
</html>


