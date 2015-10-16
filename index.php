<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<title>Simple StackExchange | Buat Pertanyaan</title>

<?php include 'config.php' ?>
</head>

<body class="default">
<div class="wrapper">

<nav>
    <a style="border:none;" id="logo" href="index.html"><h1><center><strong>Simple StackExchange</strong></center></h1></a>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <div id="contact-area">
                <form method="post" action="#">
                    <input type="text" name="topicsearch" id="topicsearch" placeholder="Search What">

                    <input type="submit" name="search" value="search" class="submit-button">
                    <p>Cannot find what youre looking for? <a href="ask.html">Ask here</a></p>
                </form>
            </div>
            <br>
            <br>
            <h5><center>Recently Asked Question</center></h5></br>
            <hr>
            <?php
                $sql = "SELECT * FROM question";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $ans = mysqli_query($conn,"SELECT count(*) AS answ FROM answer WHERE idquest =" . $row['id']);
                        $low = mysqli_fetch_assoc($ans);
                        echo "\t\t".$row["vote"]."\t\t". $low['answ'] ."       "."<a href='detail.php?id=".$row['id']."'>".$row["topik"] ."</a>       </p><br>";
                        echo "<p>Votes " ."  Answer\t ". " Asked by " . $row["nama"]." ". $row["waktu"]. "| <a href='edit.php?id=".$row['id']."'>edit</a> | <a href='delete.php?id=".$row['id']."'>delete</a> </p><br>";
                    }
                } else {
                    echo "0 results";
                }
                mysqli_close($conn);
            ?> 
        </div>
    </div>
</article>

<footer class="footer">
    <div class="back-to-top"><a href="herryfauzan.com">&copy; Heri Fauzan/13513028 </a></div>
</footer>
</div>

</body>
</html>