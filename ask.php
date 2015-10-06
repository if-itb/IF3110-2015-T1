<?php
    if (!empty($_POST["name"]) && !empty($_POST["email"]) &&
        !empty($_POST["topic"]) && !empty($_POST["content"])): ?>
    <?php
        $mysqli = new mysqli("localhost", "root", "", "exchangelyz");
        $name = $_POST["name"];
        $email = $_POST["email"];
        $topic = $_POST["topic"];
        $content = $_POST["content"];
        if (empty($_POST["id"])) {
            $query = "INSERT INTO question (name, email, topic, content) VALUES ('$name', '$email', '$topic', '$content')";
            $id = $mysqli->insert_id;
        }
        else {
            $id = $mysqli->real_escape_string($_POST["id"]);
            $query = "UPDATE question SET name='$name', email='$email', topic='$topic', content='$content' WHERE id='$id'";
        }
        $result = $mysqli->query($query);
        header("Location: question.php?id=". $id);
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
            <?php
                $name = ""; $email = ""; $topic = ""; $content = "";
                if (!empty($_GET["id"])) {
                    $mysqli = new mysqli("localhost", "root", "", "exchangelyz");
                    $id = $mysqli->real_escape_string($_GET["id"]);
                    $query = "SELECT * FROM question WHERE id='$id'";
                    $result = $mysqli->query($query);
                    if ($row = $result->fetch_assoc()) {
                        $name = $row["name"];
                        $email = $row["email"];
                        $topic = $row["topic"];
                        $content = $row["content"];
                        echo '<input type="hidden" name="id" value="'.$row["id"].'">';
                    }
                }
                echo '<input type="text" name="name" placeholder="Name" autofocus value="'.$name.'">';
                echo '<input type="email" name="email" placeholder="Email" value="'.$email.'">';
                echo '<input type="text" name="topic" placeholder="Topic" value="'.$topic.'">';
                echo '<input type="text" name="content" placeholder="Content" value="'.$content.'">';
                echo '<input type="submit" value="Post">';
            ?>
        </form>
    </div>
    </body>
    </html>
<?php endif; ?>

