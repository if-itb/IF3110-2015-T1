<!DOCTYPE html>
<html>

<!--
Simple StackExchange
website ini dibuat dengan menggunakan PHPstorm, mysql, phpmyadmin dan Opera
oleh karena itu, website ini diharapkan akan berjalan maksimal pada browser Opera versi 32.0.1948.69

file ini (Homepage merupakan file utama untuk membuka website ini,
selanjutnya pada page-page berikutnya jika menge-klik Judul Simple StackExchange akan diarahkan ke page ini

-->

<!--

-->


<head>
    <link rel="stylesheet" type="text/css" href="SSEstylesheet.css">
</head>

<body>
<Center>
    <!--
        berikut adalah judul utama yang merupakan pranala untuk kembali ke halaman ini,
        judul ini terdapat di setiap page
    -->
    <br>
    <a href="Homepage.php" id="dashboard">Simple StackExchange</a>
    <br><br>

    <script>
/*berikut adalah kode ajax untuk memvalidasi searchbox
validasi hanya menge-cek apakah input kosong atau tidak
* */
        function checkscript() {
            var search = document.forms["searchbox"]["Search"].value;
            if (search=="") {
                // something i s wrong
                alert("field search tidak boleh kosong");
                return false;
            }
            return true;
        }
    </script>


    <form name="searchbox" action="search.php" method="post">
        <input type="text" name="Search" value="">
        <input type="submit" value="search" onclick=" return checkscript()"><br>
    </form>



    <!--
            link untuk membuat pertanyaan baru
        -->
    <p>Cannot find what you are looking for?
        <a href="NewQuestion.php">ask here</a>
    </p>

    <h4 class="relative1">
        Frequently Asked Question
    </h4>


    <!--
        homepage lalu akan memanggil halaman QuestionLoop yang akan menampilkan question
        berdasarkan database
    -->
    <?php

        include 'QuestionLoop.php';

    ?>

    <hr width="770">

    <br>

</center>

</body>
</html>
