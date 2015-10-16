<?php 
    include 'index.php';
    $get = $_POST['id'];
    $id = $get;
    $choice = $_POST['choice'];
    if (($choice==1) && (isset($_POST["submit"])))
    {
        $user = mysqli_real_escape_string($con, $_POST['createname']);
        $user_email = mysqli_real_escape_string($con, $_POST['createemail']);
        $topic = mysqli_real_escape_string($con, $_POST['createtopic']);
        $content = mysqli_real_escape_string($con, $_POST['createcontent']);
        $sql= "UPDATE question SET user='$user', user_email='$user_email', topic='$topic', content='$content' WHERE id = $id";
        if (mysqli_query($con,$sql))
        {
            header("Location: list.php");
        }
        else
        {
            echo "ERROR: Tidak dapat mengeksekusi $sql. ".mysqli_error($con);
        }
    }
    if ($choice==2)
    {
        $sql = "DELETE FROM question WHERE id = $id";
        if (mysqli_query($con,$sql))
        {
            echo "berhasil dihapus";
            header("Location: list.php");
        }
        else
        {
            echo "ERROR: Tidak dapat mengeksekusi $sql. ".mysqli_error($con);
        }
    }
?>