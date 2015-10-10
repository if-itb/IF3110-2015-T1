<?php
/**
 * Created by PhpStorm.
 * User: sorlawan
 * Date: 10/10/15
 * Time: 12:01
 */

#Sambungan database
require_once("connectDatabase.php");

#ID pertanyaan yang akan diedit
$idEdited = $_POST["idEdited"];

#Apakah request berasal dari Detail page , jika YA akan redirect kembali ke Detail page
$isFromDetailPage = $_POST["isFromDetailPage"];

#Mengambil field-field dari pertanyaan yang akan diedit
$query = "SELECT * FROM questions WHERE q_id=$idEdited";
$result = mysqli_query($link,$query);

#Mem-fetch hasilnya
$row =mysqli_fetch_assoc($result);

mysqli_close($link);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ask Your Question</title>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Slab:400,700italic,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../styles/main.css">
    <script type="text/javascript" src="../scripts/validate.js"></script>
</head>
<body>
<div class="header"><a href="../index.html"><h1>Simple StackExhange</h1></a></div>
<div class="container">
    <h2>Edit your question!</h2>
<!--Field dari form diIsi dengan field-field yang telah diperoleh dari database-->
    <form name="questionForm"  action="addQuestion.php" method="POST">
        <input type="text"  id="name" name="name" placeholder="Name" value="<?php echo $row['name'] ?>"/>
        <input type="text"  id="email" name="email" placeholder="Email" value="<?php echo $row['email'] ?>"/>
        <input type="text" id="qtopic" name="qtopic" placeholder="Question Topic" value="<?php echo $row['qtopic'] ?>"/>
        <textarea  id="qcontent" name="qcontent" placeholder="Content" ><?php echo $row['qcontent'] ?></textarea>
        <input type="hidden" name="idEdited" value="<?php echo $idEdited ?>"/>
        <input type="hidden" name="isFromDetailPage" value="<?php echo $isFromDetailPage ?>"/>
        <button  id="submitBtn" class="submitBtn" >Edit</button>
    </form>
</div>

<script>
    (function(){
        //Melakukan validasi
        document.getElementById('submitBtn').onclick=function(event){
            var name = document.getElementById('name');
            var email = document.getElementById('email');
            var qtopic = document.getElementById('qtopic');
            var qcontent = document.getElementById('qcontent');
            if (validateForm(name, email, qtopic, qcontent)) {
                document.questionForm.submit();
            }
            else
            {
                //Mencegah submit jika field masih belum valid
                event.preventDefault();
            }
        }
    })();
</script>
</body>
</html>

