<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" &&
        !empty($_POST["name"]) && !empty($_POST["email"]) &&
        !empty($_POST["topic"]) && !empty($_POST["content"])) {
        require_once "db.php";
        $mysqli = DB::getInstance();
        $name = $mysqli->real_escape_string($_POST["name"]);
        $email = $mysqli->real_escape_string($_POST["email"]);
        $topic = $mysqli->real_escape_string($_POST["topic"]);
        $content = $mysqli->real_escape_string($_POST["content"]);
        if (empty($_POST["id"])) {
            $query = "INSERT INTO question (name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')";
            $mysqli->query($query);
            $id = $mysqli->insert_id;
        }
        else {
            $id = $mysqli->real_escape_string($_POST["id"]);
            $query = "UPDATE question SET name='$name', email='$email', topic='$topic', content='$content' WHERE id='$id'";
            $mysqli->query($query);
        }
        header("Location: question.php?id=". $id);
        die();
    }
    else if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["id"])) {
        require_once "db.php";
        $mysqli = DB::getInstance();
        $id = $mysqli->real_escape_string($_GET["id"]);
        $query = "SELECT * FROM question WHERE id='$id'";
        if ($row = $mysqli->query($query)->fetch_assoc()) {
            $name = $row["name"];
            $email = $row["email"];
            $topic = $row["topic"];
            $content = $row["content"];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/font.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/custom.js"></script>
    <title>Exchange Lyz</title>
</head>
<body>
    <?php require_once "header.php" ?>
    <div class="container">
        <h2>What's your question?</h2>
        <hr class="heading">
        <form onsubmit="return validate()" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <input type="text" name="name" placeholder="Name" autofocus value="<?= (isset($name) ? $name : "") ?>"></input>
            <input type="text" name="email" placeholder="Email" value="<?= (isset($email) ? $email : "") ?>"></input>
            <input type="text" name="topic" placeholder="Question Topic" value="<?= (isset($topic) ? $topic : "") ?>"></input>
            <textarea  name="content" placeholder="Content" rows="7"><?= (isset($content) ? $content : "") ?></textarea>
            <input type="submit" class="btn-default btn-right" value="Post"></input>
            <?php if (isset($id)): ?>
            <input type="hidden" name="id" value="<?= $id ?>"></input>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
