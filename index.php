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
    <div class="div-search">
        <form action="search.php" method="get">
            <input class="txt-search" type="search" name="q" placeholder="Search..." autofocus required>
            <input class="btn-search" type="submit" value="Search"><br>
            Cannot find what you are looking for? <a href="ask.php">Ask here</a>
        </form>
    </div>
    <div class="container">
        <h3>Recently Asked Questions</h3>
        <hr class="heading">
        <?php
            require_once "db.php";
            $mysqli = DB::getInstance();
            $question_rows = array();
            if ($result = $mysqli->query("SELECT * FROM question ORDER BY time DESC LIMIT 10")) {
                while ($row = $result->fetch_assoc()) {
                    $query = "SELECT id FROM answer WHERE id_question='". $row["id"] ."'";
                    $row["answer"] = $mysqli->query($query)->num_rows;
                    $question_rows[] = $row;
                }
                $result->close();
            }
        ?>
        <?php foreach($question_rows as $question_row): ?>
            <div class=question-item>
            <div class="stat">
                <div class="vote">
                    <div class="vote-count-mini">
                        <span><?= $question_row["vote"] ?></span>
                    </div>
                    <div>votes</div>
                </div>
                <div class="answer">
                    <div class="answer-count-mini">
                        <span><?= $question_row["answer"] ?></span>
                    </div>
                    <div>answers</div>
                </div>
            </div>
            <div class="question-summary">
                <h3 class="topic"><a class="topic" href="question.php?id=<?= $question_row["id"] ?>"><?= $question_row["topic"] ?></a></h3>
                <p><?= $question_row["content"] ?></p>
                <div class="timestamp">
                    asked by <?= $question_row["name"] ?> at <?= $question_row["time"] ?>| <a href=ask.php?id=<?= $question_row["id"] ?>>edit</a> | <a href="#" onclick="deleteQuestion(<?= $question_row["id"] ?>)">delete</a>
                </div>
            </div>
        </div>
        <hr class="item">
        <?php endforeach; ?>
    </div>
</body>
</html>
