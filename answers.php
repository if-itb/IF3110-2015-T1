<!DOCTYPE html>
<html lang="en-US">
        
<head>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>stackEXchange</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="style/main.css">
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/script.js"></script>
</head>

<body>
    <h1><a href="index.php">stackEXchange</a></h1>
    
    <?php 
    /* Membuka koneksi ke database */
    include "connect.php";
    $id=$_GET["id"];
    $sql="SELECT content, name, email, topic, qid, voteup, votedown, datetime FROM q_list WHERE qid='$id'";
    $result=mysqli_query($link,$sql);
    //Untuk memunculkan answers ke halaman tersebut
    while ($row = mysqli_fetch_assoc($result)){
        
    ?>
    <h2 class="anstitle"><?php echo $row["topic"]; ?></h2>
    <div class="titlep">
            <div class="votecount">
                <div class="votebuttup"><a onclick="votingup(<?php echo $id;?>, 1)">▲</a></div>
                <div id="votecountnum"><?php echo $row["voteup"] - $row["votedown"]; ?></div>
                <div class="votebuttdown"><a onclick="votingup(<?php echo $id;?>, 2)">▼</a></div>
            </div>
            <div class="content">
                <div class="isipertanyaan"><?php echo $row["content"]; ?></div>
                <div class="footerpertanyaan">asked by: <a href="mailto:<?php echo $row["email"]; ?>"><span class="namanya"><?php echo $row["email"]; ?></span></a> at <?php echo $row["datetime"];?> | <form action="edit.php" method="post" class="editnya">            
                <input type="hidden" name="idnya" value="<?php echo $row["qid"] ?>">
                <span class="buttonlink"><button type="submit">edit</button></span>
            </form>
            |  <a href="delete.php?qid=<?php echo $row["qid"];?>" onclick="hapusquestion()" class="deletenya">delete</a>
                </div>
            </div>
    </div>
    
    
    <?php 
    }
    if(isset($_POST['submit']))
    {
        $ansname = $_POST["Name"];
        $ansemail = $_POST["email"];
        $anscontent = $_POST["content"];
        $curdate = date("Y-m-d H:i:s");
        $sql="UPDATE q_list SET anscount=anscount+1 WHERE qid =$id";
        $result=mysqli_query($link,$sql);
        $anssql="INSERT INTO a_list (name, email, content, q_id, datetime) VALUE ('$ansname', '$ansemail', '$anscontent', '$id', '$curdate')";
        $result=mysqli_query($link,$anssql);
    }

    $anssql="SELECT content, email, datetime, q_id, voteup, votedown, ansid, name FROM a_list WHERE q_id =$id";
    $ansresult=mysqli_query($link,$anssql);

    ?>
    <h2 class="anstitle"><?php echo mysqli_num_rows($ansresult);?> Answers</h2>
    
    <?php 
    while ($ans_row = mysqli_fetch_assoc($ansresult)){
    ?>
    <div class="answersp">
        <div class ="votecount">
            <div class="votebuttup"><a onclick="votingans(<?php echo $ans_row["ansid"];?>, 3)">▲</a></div>
            <div id="votecountans"><?php echo $ans_row["voteup"] - $ans_row["votedown"]; ?></div>
            <div class="votebuttdown"><a onclick="votingans(<?php echo $ans_row["ansid"];?>, 4)">▼</a></div>
        </div>
        <div class="content">
            <div class="isijawaban"><?php echo $ans_row["content"]; ?></div>
            <div class="footerjawaban">Answered by: <span id="namapenjawab"><?php echo $ans_row["name"];?></span> at <?php echo $ans_row["datetime"];?></div>
        </div>
    </div>
    <?php
        
    }
    ?> 
    <h2 class="anstitle">Let's Answer This Question?</h2>
        <div id="askbar">
            <form method="post" action="answers.php?id=<?php echo $id; ?>" name="form2" onsubmit="return validateForm()">
                <input type="text" name="Name" placeholder="nama" class="inputask" id="asknama">
                <input type="email" name="email" placeholder="email" class="inputask">
                <textarea rows="4" columns="30" type="text" name="content" placeholder="content" class="inputask" id="contentpost"></textarea>
                <input type="submit" name="submit" value="Post" id="submitans">
            </form>
        </div>
</body>
	
</html>