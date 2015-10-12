<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" &&
        !empty($_POST["name"]) && !empty($_POST["email"]) &&
        !empty($_POST["content"] && !empty($_POST["id"]))) {
        require_once "db.php";
        $mysqli = DB::getInstance();
        $name = $mysqli->real_escape_string($_POST["name"]);
        $email = $mysqli->real_escape_string($_POST["email"]);
        $content = $mysqli->real_escape_string($_POST["content"]);
        $id_question = $mysqli->real_escape_string($_POST["id"]);
        $query = "INSERT INTO answer (name, email, content, id_question) VALUES ('$name', '$email', '$content', '$id_question')";
        $mysqli->query($query);
        header("Location: question.php?id=". $id_question);
        die();
    }
    else if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["id"])) {
        require_once "db.php";
        $mysqli = DB::getInstance();
        $query = "SELECT * FROM question WHERE id='" . $mysqli->real_escape_string($_GET["id"]) . "'";
        $question_result = $mysqli->query($query);
        if (!$question_result->num_rows) {
            header("Location: index.php");
            die();
        }
        $question_row = $question_result->fetch_assoc();
        $answer_rows = array();
        $query = "SELECT * FROM answer WHERE id_question='". $question_row["id"] ."'";
        $result = $mysqli->query($query);
        while ($answer_row = $result->fetch_assoc()) {
            $answer_rows[] = $answer_row;
        }
        $answer_count = count($answer_rows);
    }
    else {
        header("Location: index.php");
        die();
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
        <h2 class="topic"><a class="topic" href="question.php?id=<?= $question_row["id"] ?>"><?= $question_row["topic"] ?></a></h2>
        <hr class="heading">
            <div class="question-item">
                <div class="vote-panel">
                    <div class="vote-up" onclick="vote('question',<?= $question_row["id"] ?>,'up')"></div>
                    <div class="vote-count">
                        <span id="question-<?= $question_row["id"] ?>"><?= $question_row["vote"] ?></span>
                    </div>
                    <div class="vote-down" onclick="vote('question',<?= $question_row["id"] ?>,'down')"></div>
                </div>
                <div class="question-content">
                    <p><?= $question_row["content"] ?></p><br>
                    <div class="timestamp">
                        asked by <a href="mailto:<?= $question_row["email"] ?>" target="_blank"><?= $question_row["name"] ?></a> at <?= $question_row["time"] ?> | <a class="edit" href=ask.php?id=<?= $question_row["id"] ?>>edit</a> | <a class="delete" href="#" onclick="deleteQuestion(<?= $question_row["id"] ?>)">delete</a>
                    </div>
                </div>
            </div>
            <br>
            <?php if ($answer_count): ?>
                <h2><?= $answer_count ?> Answer<?php if ($answer_count > 1): ?><?= "s" ?><?php endif; ?></h2>
                <hr class="heading">
                <div class="answer-list">
                <?php foreach($answer_rows as $answer_row): ?>
                    <div class="answer-item">
                        <div class="vote-panel">
                            <div class="vote-up" onclick="vote('answer',<?= $answer_row["id"] ?>,'up')"></div>
                            <div class="vote-count">
                                <span id="answer-<?= $answer_row["id"] ?>"><?= $answer_row["vote"] ?></span>
                            </div>
                            <div class="vote-down" onclick="vote('answer',<?= $answer_row["id"] ?>,'down')"></div>
                        </div>
                        <div class="answer-content">
                            <p><?= $answer_row["content"] ?></p>
                            <div class="timestamp">
                                answered by <a href="mailto:<?= $answer_row["email"] ?>" target="_blank"><?= $answer_row["name"] ?></a> at <?= $answer_row["time"] ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
            <?php endif; ?>
            <br>
            <h2>Your Answer</h2>
            <hr class="heading">
            <form onsubmit="return validate()" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
                <input type="text" name="name" placeholder="Name"></input>
                <input type="text" name="email" placeholder="Email"></input>
                <textarea  name="content" placeholder="Content" rows="7"></textarea>
                <input type="submit" class="btn-default btn-right" value="Post"></input>
                <input type="hidden" name="id" value="<?= $question_row["id"] ?>"></input>
            </form>
        </div>
</body>
</html>
