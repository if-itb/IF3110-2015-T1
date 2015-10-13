<?php 
    include 'index.php';
    $sql= "SELECT q.id AS id,q.topic,q.content,q.user,q.create_time,q.vote AS qvote, count(a.id) as anumber FROM question q LEFT JOIN answer a on q.id = a.question_id GROUP BY q.id ORDER BY q.create_time DESC";
    $result = $con->query($sql);
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
        <title>Simple Stack Exchange</title>
    </head>
    <body>
        <div class="container">
            <div class="title">Simple StackExchange</div>
            <div class="containersearch">
                <form class="formwrap formsearch">
                    <input type="text" id="search" placeholder="Search Questions..." />
                    <button type="submit">Search</button>
                </form>
            </div>
            <div class="textunder">
                <p class="text1">Cannot find what you are looking for?</p><a class="ah"href="create.php">Ask here</a>
            </div>
            <p class="raqtext">Recently Asked Questions</p>
            <?php
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
                    <a href="#" class="edit">edit </a>
                    <a href="#" class="delete">delete </a>
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