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
    
    <form id="searchbar"><input type="search" name="search"><button type="button">Search</button></input></form>
    <p>Cannot find what you are looking for? <a href="ask.php">Ask here</a></p>
    
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
        $sql="INSERT INTO qlist (name, email, topic, content, datetime)  VALUES ('$name', '$email', '$topic', '$content', '$curdate')";
    }
    else { // edit post yang ada
        $sql="UPDATE qlist SET name='$name', email='$email', topic='$topic', content='$content', datetime='$curdate' WHERE id='$id'";
    }
    $result=mysqli_query($link,$sql);
    }

    
    // Mengecek koneksi ke database 
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // Query untuk mengambil data dari MySQL 
    $sql="SELECT content, email, topic, id, voteup, votedown, anscount FROM qlist ORDER BY datetime DESC";

    // Hasil dari query yang sudah diambil
    $result=mysqli_query($link,$sql);

    // Mengambil setiap data yang ada 
    while ($row = mysqli_fetch_assoc($result)) {
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
            <div class="questiontopic"><a href="answers.php?id=<?php echo $row["id"];?>"><?php echo $row["topic"]; ?></a></div>
            <div class="questioncontent"><p><?php echo $row["content"]; ?></p></div>
        </div>
        
        <div class="questionfooter">Asked by: <?php echo $row["email"]; ?> | <form action="edit.php" method="post">            
                <input type="hidden" name="idnya" value="<?php echo $row["id"] ?>">
                <div class="buttonlink"><button type="submit">edit</button></div>
            </form>
            |  <a href="#" onclick="hapusquestion()">delete</a></div>

    </div>
    <?php 
    }
    mysqli_free_result($result);

    /* close connection */
    mysqli_close($link);
    ?>
</body>
	
</html>