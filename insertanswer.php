<?php 
    include 'index.php';
    $get = $_GET['id'];
    $qid = (int) base64_decode($get);
    if (isset($_POST["submit"]))
    {
        $user = mysqli_real_escape_string($con, $_POST['createname']);
        $user_email = mysqli_real_escape_string($con, $_POST['createemail']);
        $content = mysqli_real_escape_string($con, $_POST['createcontent']);
        $sql= "INSERT INTO answer (question_id,user,user_email,content) VALUES ('$qid','$user','$user_email','$content')";
        if (mysqli_query($con,$sql))
        {
            header('Location: detail.php?topic='.$get);
        }
        else
        {
            echo "ERROR: Tidak dapat mengeksekusi $sql. ".mysqli_error($con);
        }
    }
?>