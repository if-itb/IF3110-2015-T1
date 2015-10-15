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
    $key = $_GET["key"];
    $srcsql="SELECT content, email, topic, qid, voteup, votedown, anscount, datetime FROM q_list WHERE topic LIKE '%$key%'";
    $srcresult=mysqli_query($link,$srcsql);
    //Untuk memunculkan answers ke halaman tersebut
    ?>

    <h2 class="anstitle">Search Result:</h2>
    
    <?php 
    while ($row = mysqli_fetch_assoc($srcresult)) {
    ?>
    
    <div class="questionlist">
        <div class="angka">
            <div class="vote">
                <div class="jlhvote"><?php echo $row["voteup"] + $row["votedown"]; ?></div>
                <div class="ketvote">Votes</div>
            </div>
            <div class="answers">
                <div class="jlhvote"><?php echo $row["anscount"]; ?></div>
                <div class="ketvote">Answers</div>
            </div>
        </div>
        
        <div class="iquestion">
            <div class="questiontopic"><a href="answers.php?id=<?php echo $row["qid"];?>"><?php echo $row["topic"]; ?></a></div>
            <div class="questioncontent"><p><?php echo $row["content"]; ?></p></div>
        </div>
        
        <div class="questionfooter">Asked by: <?php echo $row["email"]; ?> | <form action="edit.php" method="post">            
                <input type="hidden" name="idnya" value="<?php echo $row["qid"] ?>">
                <div class="buttonlink"><button type="submit">edit</button></div>
            </form>
            |  <a href="delete.php?qid=<?php echo $row["qid"];?>" onclick="hapusquestion()">delete</a>
        </div>

    </div>
    <?php 
    }

    ?>
</body>
	
</html>
