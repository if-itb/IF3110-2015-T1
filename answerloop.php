<?php
/**
 * Created by PhpStorm.
 * User: Khalil Ambiya
 * Date: 10/10/2015
 * Time: 8:42 AM
 */
$questionID=$_GET["questionID"];
//commencing database access
$servername = "localhost";
$username = "root";
$password = "";
$basisdata= "question";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $basisdata);
//Count questions
$sql = "select count(question_id)
            as num_of_answers
            from answer;
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
    $answer_id = $row["answer_id"];
    $answered_by_by[$nAnswer] = $row["answered_by"];
    $vote[$nAnswer] = $row["vote_point"];
    $content[$nAnswer] = $row["content"];
    $datetime[$nAnswer] = $row["datetime"];
    $email[$nAnswer] = $row["email"];
}
//Close Connection
mysqli_close($conn);

for ($count=0;$count<=$num_of_answers;$count++) {
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
               [
               <a href="http://www.google.com">edit</a>
               ]
               <a href="http://www.google.com" id="redlink">delete</a>

           </td>
       </tr>

       </table>'
       ;
}
?>