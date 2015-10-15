<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>stackEXchange | Question</title>
        <meta name="description" content="Simple StackExchange">
        <link rel="stylesheet" href="style/main.css">
    </head>
    <body>
        <h1>stackEXchange</h1>
        
        <h2>Edit Question : <?php 
            include "connect.php";
            $qid=$_POST["idnya"];
            $sql="SELECT name, content, email, topic, qid  FROM q_list WHERE qid=$qid";
            // Hasil dari query yang sudah diambil
            $result=mysqli_query($link,$sql);
            while ($row = mysqli_fetch_assoc($result)){
            
            ?></h2>
        <div id="askbar">
            <form method="post" action="index.php"><input type="text" name="Name" placeholder="nama" class="inputask" id="asknama" value="<?php echo $row["name"]; ?>">
            <input type="email" name="email" placeholder="email" class="inputask" value="<?php echo $row["email"]; ?>">
            <input type="text" name="topic" placeholder="Question Topic" class="inputask" value="<?php echo $row["topic"]; ?>">
            <textarea rows="4" columns="30" type="text" name="content" placeholder="content" class="inputask" id="contentpost"><?php echo $row["content"]; ?></textarea>
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <input type="submit" name="submit" value="Post"></form>
        </div>
        
        <?php 
                
            }
        ?>
    </body>
    
    
    </html>