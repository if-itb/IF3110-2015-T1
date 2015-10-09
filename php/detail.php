<?php
/**
 * Created by PhpStorm.
 * User: sorlawan
 * Date: 06/10/15
 * Time: 11:49
 */
require("connectDatabase.php");


#Id Question yang di klik client
$id=$_GET['id'];
if(!isset($id)) {
    $id = $_POST['idClicked'];
}

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

#Memperoleh Question yang Bersangkutan
$query = "SELECT * FROM questions WHERE q_id=$id";
$result = mysqli_query($link, $query) ;
$row =mysqli_fetch_assoc($result);
mysqli_free_result($result);

#Memperoleh Jawaban - Jawaban dari Pertanyaan tersebut
$rowAnswer = array();
$query = "SELECT * FROM answers where q_id=$id ORDER BY vote DESC ";
$resultAnswer = mysqli_query($link, $query);

while ($rowAns = mysqli_fetch_assoc($resultAnswer))
{
    array_push($rowAnswer,$rowAns);
}
$json=json_encode($rowAnswer);
mysqli_close($link);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin+Slab:400,700italic,300' rel='stylesheet' type='text/css'>

    <script src="../scripts/detail.js"></script>
    <script src="../scripts/handler.js"></script>
    <script src="../scripts/validate.js"></script>
</head>
<body>
<p id="x" style="display: none"><?php echo($json) ?></p>
<div class="header"><a href="../index.html"><h1>Simple StackExhange</h1></a></div>
<div class="container containerDetail">
    <h2><?php echo $row['qtopic']?></h2>
    <div class="row rowQuestion clearfix">
        <div class="colVote">
            <div class="qVote arrow-up"></div>
            <span class="qVoteVal"><?php echo $row['vote'] ?></span>
            <div class="qVote arrow-down"></div>
        </div>
        <div class="elemQDetail">
            <p><?php echo $row['qcontent'] ?></p>
            <div class="elemAuthor">
                <span class='askedBy'>Asked By : </span>
                <div class='author'><span class='name'><?php echo $row['email'] ?> at <?php echo $row['date'] ?>
                        <span class='edit'>Edit</span><span class='delete'>Delete</span> </span>
                </div>
            </div>
        </div>
    </div>

    <div class="answer">
        <h2><?php echo $row['answer'] ?> Answer</h2>
    </div>

    <div class="yourAnswer">
        <h2 class="yourAnswerTitle">Your Answer Here</h2>
        <form name="questionForm"  action="answer.php" method="POST">
            <input type="text"  id="name" name="name" placeholder="Name"/>
            <input type="text"  id="email" name="email" placeholder="Email"/>
            <input type="hidden" id="qID" name="qID" value="<?php echo $id ?>"/>
            <textarea type="text"  id="acontent" name="acontent" placeholder="Content"></textarea>
            <button  id="submitBtn" class="submitBtn" >Answer</button>
        </form>
        <p id="idClicked" style="display:none"><?php echo $id?></p>
    </div>

    <form name="goToDelete" action="deleteQuestion.php" method="POST">
        <input type="hidden" name="idDeleted" value=<?php echo $id ?>/>
    </form>

    <script>
        (function() {
            createDetail();
        })();
    </script>

</body>
</html>




