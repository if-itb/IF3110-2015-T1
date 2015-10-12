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
    <h1>Simple Stack Exchange</h1>
</head>
    <div class="search">
        <div class="container">
            <form action="index.php" method="GET">
                <input type="text" id="search" name="search" placeholder="Search question topic or content here...">
                <input type="image" src="img/search.png" id="submit">
            </form>
        </div>
        <p class="cannot">Cannot find what you are looking for? <a href="ask.php" >Ask here</a></p>
    </div>
	
<script type="text/javascript">
function confirmDelete(id) {
	if (confirm("Are you sure to delete this question?") == true) {
		var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
				document.getElementById("question_section"+id).innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("POST", "./ajax/delete.php", true);
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);
	}
}
</script>

<div class="question_list">
    <h3>Recently Asked Questions</h3>
	<hr>
    <?php
		if (isset($_GET['search']) && !is_null($_GET['search'])) {
			$q = "SELECT * from question where topic LIKE '%$_GET[search]%' OR content LIKE '%$_GET[search]%'";
		}
		else
			$q = "SELECT * from question";
        if(!$result = $db -> query($q)){
			
            die('Error Query ['.$db -> error. ']');
        }
        while($row = $result->fetch_assoc()) : ?>
            <div class="question_section" id="question_section<?php echo$row['id']?>">
                <?php
                    $q = "SELECT COUNT(id) AS count from answer where question_id= $row[id]";
                    $rq = mysqli_query($db, $q);
                    $answer = mysqli_fetch_array($rq, MYSQLI_ASSOC)['count'];
                ?>
                        <div class="td">
							<div><?php echo $row['vote'] ?></div>
							<div>Votes</div>
						</div>
                        <div class="td2">
							<div><?php echo $answer ?></div>
							<div>Answers</div>
						</div>
                        <div>
							<div class="row_topic"><a href="question.php?id=<?php echo $row['id'] ?>&type=question_answer"><?php echo $row['topic'] ?></a></div>
							<?php
									$content = $row['content'];
									if (strlen($content) > 115) {
										echo '<div class="row">'.substr($row['content'], 0, 227) . '...' .'</div>';
									} else {
										echo '<div class="row1">'.$content.'</div>';
									}
							?>
						</div>
                <div class="creator">asked by <span class="creator_name"><?php echo $row['name']?></span> |
                    <a href="ask.php?id=<?php echo $row['id'] ?>&type=edit" class="creator_edit">edit </a> |
                    <a href="javascript:confirmDelete(<?php echo $row['id'] ?>)" class="creator_delete">delete</a>
                </div>
				<hr>
            </div>
    <?php endwhile;?>
</div>
</html>


