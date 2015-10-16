<!DOCTYPE html>
<html lang="en">

<head>
    <title>Simple StackExchange</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">

</head>
<body>
	<div class="container">
        <a href="index.php"><h1>Simple StackExchange</h1></a>
        <form action="search.php">
        <input type="search" name="s" id="forum-search"><button type="submit">Search</button><br></form>
        <div class="text-center">Cannot find what you're looking for? <a href="ask.php">Ask here</a></div>
        
        <?php
            include 'connect.php';
            $searchquery = mysql_real_escape_string($_GET["s"]); 
            $sql = "SELECT q_votes, q_answers, q_id, q_topic, q_name, q_content FROM questions WHERE q_topic LIKE '%" .$searchquery. "%' OR q_content LIKE '%" .$searchquery. "%'";
            $result = $conn->query($sql);
            ?>
            <h3><?php echo $result->num_rows;?> Results</h3><hr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {?>
                    <div class="question-block">
                        <div class="q-votes"><?php echo $row["q_votes"];?><br>Votes</div>
                        <div class="q-answers"><?php echo $row["q_answers"];?><br>Answers</div>
                        <?php $content = $row["q_content"]; $content = (strlen($content) > 178) ? substr($content,0,175).'...' : $content;?>
                        <div class="q-topic-content">
                            <div class="q-topic"><a href="view.php?id=<?php echo $row["q_id"];?>"><?php echo $row["q_topic"];?></a></div>
                            <?php $content = $row["q_content"]; $content = (strlen($content) > 178) ? substr($content,0,175).'...' : $content;?>
                            <div class="q-content"><?php echo $content; ?></div>
                        </div>
                        <div class="details">asked by <?php echo $row["q_name"];?> | <a href="edit.php?id=<?php echo $row["q_id"];?>">edit</a> | <a href="deletequestion.php?id=<?php echo $row["q_id"]?>" onclick="return confirm(\'Are you sure you want delete this question?\')">delete</a></div>    
                    </div>
                    <hr>
                <?php }
            }
        ?>
        <a href="index.php">Back to forum</a>
    </div>
</body>
</html>
