<?php
/**
 * Created by PhpStorm.
 * User: sorlawan
 * Date: 06/10/15
 * Time: 11:49
 */

require_once("connectDatabase.php");

#Id Question yang di klik client
$id = $_POST['idClicked'];


#Memperoleh Question yang Bersangkutan
$query = "SELECT * FROM questions WHERE q_id=$id";
$result = mysqli_query($link, $query) ;
$row =mysqli_fetch_assoc($result);


#Memperoleh Jawaban - Jawaban dari Pertanyaan tersebut
$rowAnswer = array();
$query = "SELECT * FROM answers where q_id=$id";
$resultAnswer = mysqli_query($link, $query);
while ($rowAns = mysqli_fetch_assoc($resultAnswer))
{
    array_push($rowAnswer,$rowAns);
}

mysqli_close($link);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="../scripts/detail.js"></script>
</head>
<body>
<div class="container">
    <h1>Simple StackExchange</h1>
    <h2><?php echo $row['qtopic']?></h2>
    <div class="row rowQuestion clearfix">
        <div class="colVote">
            <div class="qVote arrow-up"></div>
            <span class="vote"><?php echo $row['vote'] ?></span>
            <div class="qVote arrow-down"></div>
        </div>
        <div class="colQuestion">
            <p><?php echo $row['qcontent'] ?></p>
            <span>Asked By <?php echo $row['email']." at ". $row['date'] ?></span>
        </div>
    </div>


    <h2><?php echo $row['answer'] ?> Answer</h2>
    <?php
    for($i=0;$i<count($rowAnswer);$i++) {
        echo ' <div class="row rowAnswer clearfix" id='.$rowAnswer[$i]["a_id"].'>
             <div class="colVote">
                <div class="aVote arrow-up"></div>
                <span class="vote">'.$rowAnswer[$i]['vote'].'</span>
                <div class="aVote arrow-down"></div>
             </div> ' .
            '    <div class="colQuestion">
                <p>'.$rowAnswer[$i]['acontent'].' </p>
                <span>Asked By'. $rowAnswer[$i]["email"] . 'at'.' '. $rowAnswer[$i]['date'].'</span>
             </div>
        </div>';
    }
    ?>

    <h2>Your Answer Here</h2>
    <form name="questionForm"  action="answer.php" method="POST">
        <input type="text"  id="name" name="name" placeholder="Name"/>
        <input type="text"  id="email" name="email" placeholder="Email"/>
        <input type="hidden" id="qID" name="qID" value="<?php echo $id ?>"/>
        <textarea type="text"  id="acontent" name="acontent" placeholder="Content"></textarea>
        <button  id="submitBtn" class="submitBtn" >Answer</button>
    </form>

    <p id="idClicked" style="display:none"><?php echo $id?></p>
</div>

<script>
    (function() {
        createDetail();
    })();
</script>

</body>
</html>
