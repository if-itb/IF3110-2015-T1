<!DOCTYPE html>
<html lang="en">

<head>
    <title>Simple StackExchange</title>

    <link href="css/style.css" rel="stylesheet">

</head>
<body>
	<div class="container">
        <h1>Simple StackExchange</h1>
        <input type="search" name="forum_search" id="forum_search"><button type="submit">Search</button><br>
        <div class="text-center">Cannot find what you're looking for? <a href="ask.php">Ask here</a></div>
        <h3>Recently Asked Questions</h3>
        
        <hr>
        <?php
            include 'connect.php';
            $sql = "SELECT q_name, q_topic FROM questions";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="question-block">';
                    echo '    <div class="votes">'. $row['q_votes'] . '<br>Votes</div>';
                    echo '    <div class="answers">0<br>Answers</div>';
                    echo '    <div class="topic">' . $row['q_topic']. '</div>';
                    echo '    <div class="details">asked by ' . $row['q_name']. ' | edit | delete</div> ';   
                    echo '</div>';
                    echo '<hr>';
                }
            } else {
                echo "0 results";
            }
        $conn->close();
        ?>

    </div>
</body>
</html>
