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
    <h1>stackEXchange</h1>
    
    <form action="search.php" method="get">
        <input type="search" name="key" class="searchform">
        <input type="submit" name="submit" value="search" class="submitbutton">
    </form>
    <p id="keterangan">Cannot find what you are looking for? <a href="ask.php" class="yellowlink">Ask here</a></p>
    
    <h2>recently asked questions</h2>
    <?php 
    /* Membuka koneksi ke database */
    include "connect.php";
    if(isset($_POST['submit']))
    {
        $name = $_POST["Name"];
        $email = $_POST["email"];
        $topic = $_POST["topic"];
        $content = $_POST["content"];
        $id = $_POST["id"];
        $curdate = date("Y-m-d H:i:s");
        if ($id == "NULL"){ // Buat post baru
            $sql="INSERT INTO q_list (name, email, topic, content, datetime)  VALUES ('$name', '$email', '$topic', '$content', '$curdate')";
        }
        else { // edit post yang ada
            $sql="UPDATE q_list SET name='$name', email='$email', topic='$topic', content='$content', datetime='$curdate' WHERE q_list.qid='$id'";
        }
        $result=mysqli_query($link,$sql);
    }

    
    // Mengecek koneksi ke database 
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // Query untuk mengambil data dari MySQL 
    $sql="SELECT content, email, topic, qid, voteup, votedown, anscount FROM q_list ORDER BY datetime DESC";

    // Hasil dari query yang sudah diambil
    $result=mysqli_query($link,$sql);

    // Mengambil setiap data yang ada 
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    
    <div class="questionlist">
        <div class="angka">
            <div class="vote">
                <div class="jlhvote"><?php echo $row["voteup"] - $row["votedown"]; ?></div>
                <div class="ketvote">Votes</div>
            </div>
            <div class="answers">
                <div class="jlhvote"><?php echo $row["anscount"]; ?></div>
                <div class="ketvote">Answers</div>
            </div>
        </div>
        
        <div class="iquestion">
            <div class="questiontopic"><a href="answers.php?id=<?php echo $row["qid"];?>"><?php echo $row["topic"]; ?></a></div>
            <?php $contentcut=substr(strip_tags($row['content']),0,300)?>
            <div class="questioncontent"><p>"  <?php echo $contentcut; ?>  "</p></div>
        </div>
        
        <div class="questionfooter">asked by: <span class="namanya"><?php echo $row["email"]; ?></span> | <form action="edit.php" method="post" class="editnya">            
                <input type="hidden" name="idnya" value="<?php echo $row["qid"] ?>">
                <div class="buttonlink"><button type="submit">edit</button></div>
            </form>
            |  <a href="delete.php?qid=<?php echo $row["qid"];?>" onclick="return confirm('Yakin mau didelete?')" class="deletenya">delete</a>
        </div>

    </div>
    <?php 
    }

    ?>
</body>
	
</html>