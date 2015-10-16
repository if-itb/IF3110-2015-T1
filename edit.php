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
    <h2>What's your question?</h2>
    <hr>
     <?php
        include 'connect.php';
        $q_id = mysql_real_escape_string($_GET["id"]);
        $sql = "SELECT q_name, q_email, q_topic, q_content FROM questions WHERE q_id =" .$q_id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
            <form id="q-form" action="editquestion.php" method="post" id="q_form" onsubmit="return validateForm()">
                <input type="hidden" name="q_id" value="<?php echo $q_id;?>">
                <input type="text" class="form-control" placeholder="Name" name="q_name" value="<?php echo $row["q_name"] ;?>"><br>
                <input type="text" class="form-control" placeholder="Email" name="q_email" value="<?php echo $row["q_email"] ;?>"><br>
                <input type="text" class="form-control" placeholder="Question Topic" name="q_topic" value="<?php echo $row["q_topic"] ;?>"><br>
                <textarea id="q_content" name="q_content" placeholder="Content"><?php echo $row["q_content"] ;?></textarea><br>
                <button type="submit">Post</button>
            </form>
        <?php
            }
        }
    ?>
    </div>
    <script src="js/functions.js"></script>
</body>

</html>
