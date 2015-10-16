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
    <h3 style="border:none;" id="logo" ><center>Simple StackExchange</center></h3>
</nav> 
<br>
<br>
<?php
    $p = $_GET['id'];
    echo $p;
    $sql = "SELECT * FROM question WHERE id=". $p ;
    $result = mysqli_query($conn, $sql);
    //untuk total answer
    $ans = mysqli_query($conn,"SELECT count(*) AS answ FROM answer WHERE idquest =" . $p);
    $low = mysqli_fetch_assoc($ans);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "0 results";
    }
?> 

<article class="art simple post">
    <div class="art-body">
        <div class="art-body-inner">
            <h5><?php echo $row['topik'] ?><br><hr></h5>
                <ul>
                    <li class="art-list-item">
                        <div class="art-list-item-title-and-time">
                            <center><img src="assets/img/Untitled.png" alt="arrow up" action="#"></img></center><br>
                            <p><center><strong><?php echo $row['vote'] ?></strong></center></p><br>
                            <center><img src="assets/img/down.png" alt="arrow down" action="#"></img><center>
                        </div>
                        <p><?php echo $row['konten'] ?> &hellip;</p>
                        <div class="change">
                            <p style="color: blue;float: right;">
                              <?php echo "asked by ".$row['nama']." at ". $row['waktu'] ?> | <a href="#">Edit</a> | <a href="#">Delete</a>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="art-body-inner">
            <!--php echo belum diimplementasi -->
            <p><?php echo $low['answ'] ?> Answer<br><hr></p>
                <ul>
                    <?php
                        $sql = "SELECT * FROM answer WHERE idquest=". $p ;
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                        } else {
                            echo "there is no answer to show";
                        }
                    ?> 
        </div>
                    <li class="art-list-item">
                        <div class="art-list-item-title-and-time">
                            <center>
                                <?php if($low['answ']!= 0)  echo "<img src='assets/img/Untitled.png' action='#'></img></center><br>";
                                ?>
                            <p><center><strong>
                                <?php if($low['answ']!= 0)  echo $row['vote'];
                                ?>
                            </strong></center></p><br>
                            <center>
                                <?php if($low['answ']!= 0)  echo "<img src='assets/img/down.png' action='#'></img><center>";
                                ?>
                        </div><p>
                                <?php if($low['answ']!= 0)  echo $row['konten'];
                                ?>
                        </p>
                        <div class="change">
                            <p style="color: blue;float: right;">
                                <?php if($low['answ']!= 0)  echo "asked by ".$row['name']." at ".$row['waktu']."| <a href='edit.php?id=".$_GET['id'].">Edit</a> | <a href='delete.php?id=".$_GET['id'].">Delete</a>";
                                ?>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="art-body-inner">
            <hr>
            <p>Your Answer<br></p>

            <div id="contact-area">
                <form method="post" action="" >
                    <input type="text" name="Name" id="Tanggal" placeholder="Name">
                    <input type="text" name="Email" id="Email" placeholder="Email">
                    <textarea name="Konten" rows="20" cols="20" id="Konten" placeholder="Content"></textarea>
                    <br>
                    <input type="submit" name="submit" value="Post" class="submit-button">
                </form>
            </div>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="herryfauzan.com">&copy; Heri Fauzan/13513028 </div>
</footer>
</div>

</body>
</html>