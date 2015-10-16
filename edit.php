<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>stackEXchange | Question</title>
        <meta name="description" content="Simple StackExchange">
        <link rel="stylesheet" href="style/main.css">
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/script.js"></script>

    </head>
    <body>
        <h1><a href="index.php">stackEXchange</a></h1>
        
        <h2 id="asktitle">Edit Question : </h2><?php 
            include "connect.php";
            $qid=$_POST["idnya"];
            $sql="SELECT name, content, email, topic, qid FROM q_list WHERE qid=$qid";
            // Hasil dari query yang sudah diambil
            $result=mysqli_query($link,$sql);
            while ($row = mysqli_fetch_assoc($result)){
            
            ?>
        <div id="askbar">
            <form method="post" action="index.php" name="form1" onsubmit="return validateForm()">
                <input type="text" name="Name" placeholder="nama" class="inputask" id="asknama" value="<?php echo $row["name"]; ?>">
                <input type="text" name="email" placeholder="email" class="inputask" id="emailask" value="<?php echo $row["email"]; ?>">
                <input type="text" name="topic" placeholder="Question Topic" class="inputask" value="<?php echo $row["topic"]; ?>">
                <textarea rows="4" columns="30" type="text" name="content" placeholder="content" class="inputask" id="askcontent"><?php echo $row["content"]; ?></textarea>
                <input type="hidden" name="id" value="<?php echo $row["qid"]; ?>">
                <input type="submit" name="submit" value="Post" id="asksubmit">
            </form>
        </div>
        
        <?php 
                
            }
        ?>
    </body>
    
    
    </html>