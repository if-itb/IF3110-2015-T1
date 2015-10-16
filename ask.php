<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<title>Simple StackExchange | Buat Pertanyaan</title>


</head>
<?php require '\assets\php\sqlconnect.php' ?>
<body class="default">
<div class="wrapper">

<nav>
    <a style="border:none;" id="logo" href="index.html"><h1><center><strong>Simple StackExchange</strong></center></h1></a>
</nav>

<article class="art simple post">
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <p>What's Your Question?<p><hr></h2>

            <div id="contact-area">
                <form method="post" action="assets/php/create.php">
                    <input type="text" name="Name" id="Tanggal" placeholder="Name">
                    <input type="text" name="Email" id="Email" placeholder="Email">
                    <input type="text" name="Judul" id="Judul" placeholder="Question Topic" placeholder="Topic">
                    <textarea name="Konten" rows="20" cols="20" id="Konten" placeholder="Content"></textarea>
                    <br>
                    <input type="submit" name="submit" value="Post" class="submit-button">
                </form>
            </div>
        </div>
    </div>
</article>

<footer class="footer">
    <div class="back-to-top"><a href="herryfauzan.com">&copy; Heri Fauzan/13513028 </a></div>
</footer>
</div>

</body>
</html>