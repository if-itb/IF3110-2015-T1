<?php
    if (!empty($_POST["name"]) && !empty($_POST["email"]) &&
        !empty($_POST["topic"]) && !empty($_POST["content"])): ?>
    <?php
        $mysqli = new mysqli("localhost", "root", "", "exchangelyz");
        $name = $_POST["name"];
        $email = $_POST["email"];
        $topic = $_POST["topic"];
        $content = $_POST["content"];
        $query = "INSERT INTO question (name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')";
        $result = $mysqli->query($query);
        header("Location: question.php?id=". mysqli_insert_id($mysqli));
        $mysqli->close();
        die();
    ?>
<?php else: ?>
    <?php include("header.php"); ?>
    <div class="ask_header">
        <h2>What's your question?</h2>
        <hr>
    </div>
    <div class="ask_body">
        <form action="ask.php" method="post">
            <input type="text" name="name" placeholder="Name" autofocus>
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="topic" placeholder="Topic">
            <input type="text" name="content" placeholder="Content">
            <input type="submit" value="Ask">
        </form>
    </div>
    </body>
    </html>
<?php endif; ?>

