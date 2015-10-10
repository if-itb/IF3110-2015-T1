<?php

require_once("connectDatabase.php");

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$name = mysqli_real_escape_string($link,$_POST['name']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$acontent = mysqli_real_escape_string($link,$_POST['acontent']);
$qID = $_POST['qID'];

$query = "INSERT INTO answers (a_id,q_id,name,email,acontent,vote,date) VALUES(NULL,'$qID','$name','$email','$acontent',0,NULL)";
mysqli_query($link,$query);

$query = "UPDATE questions SET answer=answer+1 WHERE q_id = '$qID'";
mysqli_query($link,$query);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form name="toDetail" action="Detail.php" method="POST">
    <input type="hidden" name="idClicked" value="<?php echo $qID ?>"/>
</form>
<script>
    (function() {
       document.toDetail.submit();
    })();
</script>
</body>
</html>
