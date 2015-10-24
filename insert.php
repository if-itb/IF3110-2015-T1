<?php 
    include 'index.php';
    if (isset($_POST["submit"]))
    {
        $user = mysqli_real_escape_string($con, $_POST['createname']);
        $user_email = mysqli_real_escape_string($con, $_POST['createemail']);
        $topic = mysqli_real_escape_string($con, $_POST['createtopic']);
        $content = mysqli_real_escape_string($con, $_POST['createcontent']);
        $sql= "INSERT INTO question (user,user_email,topic,content) VALUES ('$user','$user_email','$topic','$content')";
        if (mysqli_query($con,$sql))
        {
            header("Location: list.php");
        }
        else
        {
            echo "ERROR: Tidak dapat mengeksekusi $sql. ".mysqli_error($con);
        }
    }
?>