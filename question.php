<?php
require_once("./sql/mysql.php");
?>

<?php
$db = new mysqli('localhost','root','','StackExchange');
$id = isset($_GET['id']) ? $_GET['id'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type="text/css" href="css/style.css">
    <h1>Simple Stack Exchange</h1>
</head>
<?php
$q = "SELECT * from question where id=$id ";
if(!$result = $db -> query($q)){
    die('Error Query ['.$db -> error. ']');
}
else{
    $row = $result->fetch_assoc();
}
?>

<script type="text/javascript">
    function vote(id,type,result){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
				if(type == 'question')
					document.getElementById("questionvote").innerHTML = xhttp.responseText;
				else
					document.getElementById("answervote"+id).innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("POST", "./ajax/vote.php", true);
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("action=" +result+ "&id=" + id + "&type=" + type);
    }

</script>

<script type="text/javascript">
function confirmDelete(id) {
	if (confirm("Are you sure to delete this question?") == true) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
				  location.href = "./index.php";
				}
			}
        xhttp.open("POST", "./ajax/delete.php", true);
        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);
	}
}
</script>

<div class="question_section">
    <h2><?php echo $row['topic'] ?></h2>
    <hr>
    <div class="question_content">
            <div class="vote">
                <div><a href=javascript:vote(<?php echo $id?>,'question','up')><img src="img/up.png" width="32" height="32"></a></div>
                <div id="questionvote"><?php echo $row['vote'] ?></div>
				<div><a href=javascript:vote(<?php echo $id?>,'question','down')><img src="img/down.png" width="32" height="32"></a></div>
            </div>
            <div>
                <?php
					if (strlen($row['content']) > 130) {
						echo '<div class="content">'.$row['content'].'</div>';
					} else {
						echo '<div class="content1">'.$row['content'].'</div>';
					}
				?>
            </div>
        <div class="creator">asked by <span class="creator_name"><?php echo $row['name'] ?></span>
            at <span class="creator_date"><?php echo $row['date'] ?></span> |
            <a href="ask.php?id=<?php echo $row['id'] ?>&type=edit" class="creator_edit">edit </a> |
            <a href="javascript:confirmDelete(<?php echo $row['id'] ?> )" target="_parent" class="creator_delete">delete</a>
        </div>
    </div>
</div>

<?php
    $q = "SELECT COUNT(id) AS count from answer where question_id=$id";
    $rq = mysqli_query($db, $q);
    $answer = mysqli_fetch_array($rq, MYSQLI_ASSOC)['count'];
?>
<div class="answer_section">
    <h2><?php echo $answer ?> Answer<?php if ($answer > 1) echo 's' ?></h2>
    <hr>
    <?php
    $q = "SELECT * from answer where question_id=$id";
    if(!$result = $db -> query($q)){
        die('Error Query ['.$db -> error. ']');
    }
    while($row = $result->fetch_assoc()) :
    ?>
    <div class="answer_content">
            <div class="vote">
                <div><a href=javascript:vote(<?php echo $row['id']?>,'answer','up')><img src="img/up.png" width="32" height="32"></a></div>
                <div id="answervote<?php echo$row['id']?>"><?php echo $row['vote']?></div>               
				<div><a href=javascript:vote(<?php echo $row['id']?>,'answer','down')><img src="img/down.png" width="32" height="32"></a></div>
            </div>
            <div>
				<?php
					if (strlen($row['content']) > 130) {
						echo '<div class="content">'.$row['content'].'</div>';
					} else {
						echo '<div class="content1">'.$row['content'].'</div>';
					}
				?>
            </div>
        </table>
    </div>
    <div class="creator">answered by <span class="creator_name"><?php echo $row['name']?></span> at <span class="creator_date"><?php echo $row['date']?></span></div>
    <hr>
    <?php endwhile; ?>
</div>

<script type="text/javascript">
    function validateAnswerForm() {
        var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (document.forms["answerform"]["name"].value == null || document.forms["answerform"]["name"].value == "" ||
            document.forms["answerform"]["email"].value == null || document.forms["answerform"]["email"].value == "" ||
            document.forms["answerform"]["content"].value == null || document.forms["answerform"]["content"].value == "") {
            alert("All required fields must be filled out");
            return false;
        }
        else if(!re.test(document.forms["answerform"]["email"].value)){
            alert("Incorrect email address");
            return false;
        }

    }
</script>

<div class="answer_box">
    <h2>Your Answer</h2>
    <form action="index.php" method="POST" class="block" name="answerform" onsubmit="return validateAnswerForm()">
        <input type="text" placeholder="Name" name="name" id="namebox"/>
        <input type="text" placeholder="Email" name="email" id="emailbox" />
        <textarea name="content" placeholder="Content" id="contentbox"></textarea>
        <input type="submit" value="Post" name="Submit" id="submit"/>
        <input type="hidden" name="type" value="answer_input"  />
        <input type="hidden" name="question_id" value="<?php echo $id ?>"  />
    </form>
</div>
</html>

<?php $db->close(); ?>
