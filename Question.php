<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="SSEstylesheet.css">
</head>

<?php
$questionID=$_GET["questionID"];
//commencing database access
$servername = "localhost";
$username = "root";
$password = "";
$basisdata= "question";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $basisdata);
//fetching data
$sql =  "select asked_by, questiontopic , vote_point, answers, content, datetime
             from questions where question_id=$questionID";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$asked_by = $row["asked_by"];
$questiontopic = $row["questiontopic"];
$vote_point = $row["vote_point"];
$nAnswerquestion = $row["answers"];
$contentquestion = $row["content"];
$datetimequestion = $row["datetime"];
//Close Connection
mysqli_close($conn);

?>

<body>
<Center>
    <br>
    <a href="dashboardPHP.php" id="dashboard">Simple StackExchange</a>
    <br><br>

    <h4 class="relative5">
        <?php
            echo $questiontopic;
        ?>
    </h4>

    <hr width="770">

   <table width="700" border="0px">
       <tr>
           <td width="10">
               <img src="arrowup.png" alt="upvote" style="width:40px;height:40px;" align="center">
           </td>
           <td rowspan="3">
               <?php
               echo $contentquestion;
               ?>
           </td>
       </tr>

       <tr>
           <td>
               <center>
                   <?php
                   echo $vote_point;
                   ?>
               </center>
           </td>
       </tr>

       <tr>
           <td>
               <img src="arrowdown.png" alt="upvote" style="width:40px;height:40px;">
           </td>
       </tr>

       <tr>
           <td colspan="4" align="right">

               asked by
               <a href="http://www.google.com" id="bluelink">
                   <?php
                   echo $asked_by;
                   ?></a>
               at <?php
               echo $datetimequestion;
               ?>
               [
               <a href="editquestion.php?questionID=<?php echo $questionID ?>">edit</a>
               ]
               <a href="deleteonequestion.php?questionID='<?php echo $questionID?>'" id="redlink">delete</a>

           </td>
       </tr>

       </table>


    <br><br><br><br>

    <?php

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $basisdata);
    //Count questions
    $sql = "select count(question_id)
            as num_of_answers
            from answer
            where question_id=$questionID;
            ";
    $result = mysqli_query($conn,$sql);
    $fetched = mysqli_fetch_assoc($result);
    if ($fetched["num_of_answers"]==NULL){
        $num_of_answers=0;
    }
    else{
        $num_of_answers = $fetched["num_of_answers"];
    }

    echo '<h4 class="relative4">

            '.$num_of_answers.' Answers
        </h4>';


    //fetching data
    $sql =  "select answer_id, answered_by, vote, content, datetime, email
         from answer
         where question_id=$questionID;";
    $result = mysqli_query($conn,$sql);
    $answer_id = array();
    $answered_by = array();
    $vote = array();
    $content = array();
    $datetime = array();
    $email = array();

    for ($nAnswer = 1;$nAnswer<=$num_of_answers;$nAnswer++){
        $row=mysqli_fetch_assoc($result);
        $answer_id[$nAnswer] = $row["answer_id"];
        $answered_by_by[$nAnswer] = $row["answered_by"];
        $vote[$nAnswer] = $row["vote"];
        $content[$nAnswer] = $row["content"];
        $datetime[$nAnswer] = $row["datetime"];
        $email[$nAnswer] = $row["email"];
    }
    //Close Connection
    mysqli_close($conn);

    for ($count=1;$count<=$num_of_answers;$count++) {
        echo '
     <hr width="770">

   <table width="700" border="0px">
       <tr>
           <td width="10">
               <img src="arrowup.png" alt="upvote" style="width:25px;height:25px;" align="center">
           </td>
           <td rowspan="3">
           '.$content[$count].'
           </td>
       </tr>

       <tr>
           <td>
               <center>
                   '.$vote[$count].'
               </center>
           </td>
       </tr>

       <tr>
           <td>
               <img src="arrowdown.png" alt="upvote" style="width:25px;height:25px;">
           </td>
       </tr>

       <tr>
           <td colspan="4" align="right">

               answered by
               <a href="http://www.google.com" id="bluelink">'.$email[$count].'</a>
               at '.$datetime[$count].'
               <a href="deleteoneanswer.php?answerID='.$answer_id[$count].'" id="redlink">delete</a>

           </td>
       </tr>

       </table>'
        ;
    }

    ?>

    <hr width="770">
    <h4 class="relative3">
        Your Answer
    </h4>


    <script>

        function checkscript() {
            var namesubmitted = document.forms["inputnewanswer"]["Name"].value;
            var emailsubmitted = document.forms["inputnewanswer"]["Email"].value;
            var contentsubmitted = document.forms["inputnewanswer"]["Content"].value;
            if (namesubmitted=="") {
                // something i s wrong
                alert("field nama tidak boleh kosong");
                return false;
            }else if (emailsubmitted==""){
                alert("field email tidak boleh kosong");
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
        }
    </script>



    <h4 class="relative2">
        <form name="inputnewanswer" action="InputNewAnswer.php?questionID=<?php echo $questionID ?>" method="post">
            <input type="text" name="Name" value="Name" size="100"><br>
            <input type="text" name="Email" value="Email@example.com"size="100"><br>
            <textarea class="newanswer" cols="91" rows="4" type="text" name="Content">Content
            </textarea>
            <br>
            <input class="textboxposquestion" type="submit" value="post" onclick="return checkscript()">
        </form>
    </h4>








</Center>



</body>
</html>
