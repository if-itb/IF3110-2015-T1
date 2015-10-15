<!DOCTYPE html>
<html>
<title>HTML Tutorial</title>

<?php
/**
 * Created by PhpStorm.
 * User: Khalil Ambiya
 * Date: 10/15/2015
 * Time: 1:57 AM
 */
$questionID=$_GET["questionID"];
//commencing database access
$servername = "localhost";
$username = "root";
$password = "";
$basisdata= "question";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $basisdata);
//fetching data
$sql =  "select asked_by, questiontopic , vote_point, answers, content, datetime, email
             from questions where question_id=$questionID";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$asked_by = $row["asked_by"];
$email = $row["email"];
$questiontopic = $row["questiontopic"];
$vote_point = $row["vote_point"];
$nAnswerquestion = $row["answers"];
$contentquestion = $row["content"];
$datetimequestion = $row["datetime"];
//Close Connection
mysqli_close($conn);
?>


<head>
    <link rel="stylesheet" type="text/css" href="SSEstylesheet.css">
</head>

<body>
<center>
    <a href="dashboardPHP.php" id="dashboard">Simple StackExchange</a>

    <h4 class="relative1">
        What's your question?
    </h4>

    <hr width="770">

    <script>

        function checkscript() {
            var namesubmitted = document.forms["editquestion"]["Name"].value;
            var emailsubmitted = document.forms["editquestion"]["Email"].value;
            var questiontopicsubmitted = document.forms["editquestion"]["QuestionTopic"].value;
            var contentsubmitted = document.forms["editquestion"]["Content"].value;
            if (namesubmitted=="") {
                // something i s wrong
                alert("field nama tidak boleh kosong");
                return false;
            }else if (emailsubmitted==""){
                alert("field email tidak boleh kosong");
                return false;
            }else if (questiontopicsubmitted==""){
                alert("field question topic tidak boleh kosong");
                return false;
            }else if (contentsubmitted==""){
                alert("field content tidak boleh kosong");
                return false;
            }else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailsubmitted)){
                return true;
            }else{
                alert("format penulisan email salah");
                return false;
            }


            // If the script makes it to here, everything is OK,
            // so you can submit the form
            return true;
        }
    </script>



    <form name="editquestion" action="editquestionpage.php?questionID=<?php echo $questionID?>" method="post" >
        <input type="text" name="Name" value="<?php echo $asked_by ?>" size="100"><br>
        <input type="text" name="Email" value="<?php echo $email ?>" size="100"><br>
        <input type="text" name="QuestionTopic" value="<?php echo $questiontopic ?>" size="100"><br>
        <textarea cols="91" rows="4" type="text" name="Content"><?php echo $contentquestion ?>
        </textarea>
        <br><br>
        <input class="textboxposquestion" type="submit" value="post" onclick="return checkscript()">
    </form>


</center>

</body>
</html>
