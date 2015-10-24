<?php 
    include 'index.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web for Questions and Answers">
        <meta name="author" content="13513095 Fitra Rahmamuliani">
        <link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script>
            function confirmationDelete(id,choice) 
            {
                if (confirm("Are you sure to delete this question?") == true) 
                {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() 
                    {
                        if (xhttp.readyState == 4 && xhttp.status == 200) 
                        {
                          location.href = "list.php";
                        }
                    }
                xhttp.open("POST", "update.php", true);
                xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                xhttp.send("id=" + id + "&choice=" + choice);
                }
            }
        </script>
        <title>Simple Stack Exchange</title>
    </head>
    <body>
        <div class="container">
            <div class="title"><a href="list.php">Simple StackExchange</a></div>
            <div class="containersearch">
                <form action = "list.php" class="formwrap formsearch" method="GET">
                    <input type="text" id="search" name="search" placeholder="Search Questions..." />
                    <button type="submit">Search</button>
                </form>
            </div>
            <div class="textunder">
                <p class="text1">Cannot find what you are looking for?</p><a class="ah"href="create.php">Ask here</a>
            </div>
            <p class="raqtext">Recently Asked Questions</p>
            <?php
                if (isset($_GET['search']) && !is_null($_GET['search'])) {
			$sql = "SELECT q.id AS id,q.topic,q.content,q.user,q.create_time,q.vote AS qvote, count(a.id) as anumber FROM question q LEFT JOIN answer a ON q.id = a.question_id WHERE q.topic LIKE '%$_GET[search]%' OR q.content LIKE '%$_GET[search]%' GROUP BY q.id ORDER BY q.create_time DESC";
		}
		else
                $sql= "SELECT q.id AS id,q.topic,q.content,q.user,q.create_time,q.vote AS qvote, count(a.id) as anumber FROM question q LEFT JOIN answer a ON q.id = a.question_id GROUP BY q.id ORDER BY q.create_time DESC";
    $result = $con->query($sql);
                if ($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {
            ?>
            <div class="raq">
                <div class="votepart">
                    <div class="votenumber"><?php echo $row["qvote"]?></div>
                    <div class="votetext">Votes</div>
                </div>
                <div class="answerpart">
                    <div class="answernumber"><?php echo $row["anumber"]?></div>
                    <div class="answertext">Answers</div>
                </div>
                <div class="questionpart">
                    <div class="qtopic"><?php echo '<a href="detail.php?topic='.base64_encode($row["id"]).'">';?>
                        <?php echo $row["topic"]?></a>
                    </div>
                    <div class="qcontent">
                        <?php echo $row["content"]?>
                    </div>
                </div>
                <div class="labelunder">
                    <p class="ab">asked by </p>
                    <a href="#" class="name"><?php echo $row["user"]?></a>
                    <form action="edit.php" method="post" class="hiddenform">
                        <input type="hidden" id="id" name="id" value="<?php echo $row["id"];?>"/>
                        <input class="edit" type="submit" value="edit">                        
                    </form>
                     <a href="javascript:confirmationDelete(<?php echo $row['id'] ?>,'2')" class="delete">delete</a>
                </div>
            </div>
            <?php }
                }
                    else
                        echo "0 results";
            ?>        
        </div>
    </body>
</html>
<?php $con->close();?>