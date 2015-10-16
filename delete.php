<!DOCTYPE html>
<html lang="en-US">
        
<head>
    <META http-equiv="refresh" content="0;URL=index.php">
</head>
    

<body>

<?php
    include "connect.php";
    $qid = $_GET["qid"];
    $sql = "DELETE FROM q_list WHERE qid = '$qid'";
    mysqli_query($link, $sql);
?>

</body>
</html>
