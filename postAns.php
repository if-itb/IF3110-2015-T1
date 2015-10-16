<?php
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'tucilwbd'); 
define('DB_USER','root'); 
define('DB_content',''); 
$con = mysql_connect(DB_HOST,DB_USER,DB_content) or die("Failed to connect to MySQL: " . mysql_error()); 
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 

function SubmitAnswer($qid) { 
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $content = $_POST['content'];
    $vote = filter_input(INPUT_POST, '0', FILTER_VALIDATE_INT);
    $init_ans = filter_input(INPUT_POST, '0', FILTER_VALIDATE_INT);
    $timestamp = date('Y-m-d H:i:s');
    //Insert data to question table
    $query = "INSERT INTO answer (name,email,idquestion,content,vote,timeans) VALUES ('$name','$email','$qid','$content','$vote','$timestamp')";
    //Insert data into question table
    $data = mysql_query ($query)or die(mysql_error());
    $query2 = "UPDATE question SET num_ans=num_ans+1 WHERE ID='$qid'"; 
    $data2 = mysql_query ($query2)or die(mysql_error());
    if($data&&$data2)
    {
     echo "<script type='text/javascript'>alert('We have noted your answer. Thank you') 
        window.location.href='showQA.php?id=$qid';</script>";
    } 
} 

function CheckSubmission($qid) { 
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['content']) ) 
    //checking the name,email, topic and content which cannot be empty
    { 
        SubmitAnswer($qid); 
    } else {
        echo "<script type='text/javascript'>alert('Sorry...There are empty fields... please check that you have filled all the form') 
        window.location.href='showQA.php';</script>";
    } 
} 

if(isset($_POST['submit'])) { $qid = $_POST['qID']; CheckSubmission($qid); }

?>