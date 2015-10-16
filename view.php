<!DOCTYPE html>
<html lang="en">

<head>
    <title>Simple StackExchange</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">

</head>
<body id="question">
	<div class="container">
    <a href="index.php"><h1>Simple StackExchange</h1></a>
    <?php
        include 'connect.php';
        $q_id = mysql_real_escape_string($_GET["id"]);
        $sql = "SELECT * FROM questions WHERE q_id =" . $q_id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) { ?>
                <h2><?php echo $row["q_topic"];?></h2>
                <hr>
                <div class="post-full">
                    <div class="votes">
                        <div class="upvote" onclick="return vote(<?php echo $q_id;?>,1,'questions')"></div>
                        <div class="vote-number" id="qvotes-<?php echo $q_id;?>"><?php echo $row["q_votes"];?></div>
                        <div class="downvote" onclick="return vote(<?php echo $q_id;?>,-1,'questions')"></div>
                    </div>
                    <div class="post-content">
                    <?php echo $row["q_content"]; ?>
                    </div>
                    <div class="details">asked by <?php echo $row["q_name"];?> (<?php echo $row["q_email"];?>) at <?php echo $row["q_date"] ;?> | <a href="edit.php?id=<?php echo $q_id ;?>">edit</a> | <a href="delete.php?id=<?php echo $q_id;?>" onclick="return confirm('Are you sure you want delete this question?')">delete</a></div>
                </div>
            
            <?php
            }

            //find answers
            $sql = "SELECT * FROM answers WHERE a_qid = " .$q_id. " ORDER BY a_votes DESC";
            $result = $conn->query($sql);

            $q_answers = $result->num_rows; ?>
            <h2><?php echo $q_answers;?> Answers</h2>
            <hr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>
                    <div class="post-full">
                        <div class="votes">
                            <div class="upvote" onclick="return vote(<?php echo $row["a_id"];?>,1,'answers')"></div>
                            <div class="vote-number" id="avotes-<?php echo $row["a_id"];?>"><?php echo $row["a_votes"];?></div>
                            <div class="downvote" onclick="return vote(<?php echo $row["a_id"];?>,-1,'answers')"></div>
                        </div>
                        <div class="post-content">
                        <?php echo $row["a_content"];?>
                        </div>
                        <div class="details">answered by <?php echo $row["a_name"];?> (<?php echo $row["a_email"];?>) at <?php echo $row["a_date"];?></div>
                    </div>
                    <hr>
                <?php }

                //q_answers = no. of rows found
                $sql = "UPDATE questions SET q_answers = " .$q_answers . " where q_id = " .$q_id;
                $result = $conn->query($sql);
            }

        } else {
            echo "This page does not exist.";
        }
        ?>

        <form action="submitanswer.php" method="post" id="a-form" onsubmit="return validateAnswer()">
            <input type="hidden" name="a_qid" value="<?= $q_id ?>">
            <input type="text" class="form-control" placeholder="Name" name="a_name"><br>
            <input type="text" class="form-control" placeholder="Email" name="a_email"><br>
            <textarea id="a_content" name="a_content" placeholder="Content"></textarea><br>
            <button type="submit">Post</button>
        </form>
        </div>

    <script src="js/functions.js"></script>
</body>

</html>
