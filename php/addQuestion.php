<?php

#Sambungan ke database
require_once("connectDatabase.php");

#Variabel yang akan di Edit / Tambahkan ke database
$name = mysqli_real_escape_string($link,$_POST['name']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$qtopic = mysqli_real_escape_string($link,$_POST['qtopic']);
$qcontent = mysqli_real_escape_string($link,$_POST['qcontent']);
$idEdited = $_POST['idEdited'];                 // Jika berasal dari create.html -> false
$isFromDetailPage = $_POST['isFromDetailPage']; //Jika berasal dari Detail.php -> True , akan redirect ke Detail.php

if(!isset($idEdited)) {   // Berasal dari create.html
    #Query Tambahkan Question ke Database
    $query = "INSERT INTO questions (q_id,name,email,qtopic,qcontent,answer,vote,date) VALUES(NULL,'$name','$email','$qtopic','$qcontent',0,0,NULL)";
    mysqli_query($link,$query);
    mysqli_close($link);
    header("Location: ../index.html");
    exit();
}
else {                    // Berasal dari editQuestion.php
    #Query Update Question dari Databse
    $query = "UPDATE questions SET name='$name', email='$email', qtopic='$qtopic', qcontent='$qcontent' WHERE q_id='$idEdited'";
    mysqli_query($link,$query);
    mysqli_close($link);
    if($isFromDetailPage==="false") {
        header("Location: ../index.html");
        exit();
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<!--Post id Pertanyaan ke Detail.php karena page akan redirect ke sana-->
<form name="toDetail" action="Detail.php" method="post">
    <input type="hidden" name="idClicked" value="<?php echo $idEdited ?>"/>
</form>

<script>
    (function() {
        document.toDetail.submit(); //Submit form
    })();
</script>
</body>
</html>
