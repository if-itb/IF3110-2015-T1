<?php 
    if (isset($_POST["submit"]))
    {
        $con = mysqli_connect("localhost","root","","wbd_database");
        if ($con == false)
        {
            die("ERROR! Tidak dapat terhubung ".mysqli_connect_error());
        }
        $user = mysqli_real_escape_string($con, $_POST['createname']);
        $user_email = mysqli_real_escape_string($con, $_POST['createemail']);
        $topic = mysqli_real_escape_string($con, $_POST['createtopic']);
        $content = mysqli_real_escape_string($con, $_POST['createcontent']);
        $sql= "INSERT INTO question (user,user_email,topic,content) VALUES ('$user','$user_email','$topic','$content')";
        if (mysqli_query($con,$sql))
        {
            header("Location: create.php");
        }
        else
        {
            echo "ERROR: Tidak dapat mengeksekusi $sql. ".mysqli_error($con);
        }
        mysqli_close($con);
    }
?>