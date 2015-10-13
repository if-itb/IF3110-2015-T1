<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["q"])) {
        require_once "db.php";
        $mysqli = DB::getInstance();
        $search = $mysqli->real_escape_string($_GET["q"]);
        $query = "SELECT * FROM question WHERE content LIKE '%$search%' OR topic LIKE '%$search%'";
        $search_results = array();
        $result = $mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
            $query = "SELECT id FROM answer WHERE id_question='". $row["id"] ."'";
            $row["answer"] = $mysqli->query($query)->num_rows;
            $search_results[] = $row;
        }
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
        <h2>Search results for: <?= $search ?></h2>
        <hr class="heading">
        <?php foreach($search_results as $question): ?>
            <div class=question-item>
                <div class="stat">
                    <div class="vote">
                        <div class="vote-count-mini">
                            <span><?= $question["vote"] ?></span>
                        </div>
                        <div>votes</div>
                    </div>
                    <div class="answer">
                        <div class="answer-count-mini">
                            <span><?= $question["answer"] ?></span>
                        </div>
                        <div>answers</div>
                    </div>
                </div>
                <div class="question-summary">
                    <h3 class="topic"><a class="topic" href="question.php?id=<?= $question["id"] ?>"><?= $question["topic"] ?></a></h3>
                    <p title="<?= question["content"] ?>"><?= $question["content"] ?></p><br>
                    <div class="timestamp">
                        asked by <?= $question["name"] ?> at <?= $question["time"] ?>| <a href=ask.php?id=<?= $question["id"] ?>>edit</a> | <a href="#" onclick="deleteQuestion(<?= $question["id"] ?>)">delete</a>
                    </div>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
</body>
</html>
