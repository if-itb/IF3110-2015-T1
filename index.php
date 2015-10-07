<!DOCTYPE html>
<html lang="en">

<head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple StackExchange</title>

    <link href="css/style.css" rel="stylesheet">

</head>
<body>
	<div class="container">
        <h1>Simple StackExchange</h1>
        <input type="search" name="forum_search" id="forum_search"><button type="submit">Search</button><br>
        <div class="text-center">Cannot find what you're looking for? <a href="#">Ask here</a></div>
        <h3>Recently Asked Questions</h3>
        
        <hr>
        <?php
            include 'connect.php';
            $sql = "SELECT q_name, q_topic FROM questions";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="question_block">';
                    echo '    <div class="votes">0<br>Votes</div>';
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
        <!--<div class="question_block">
            <div class="votes">0<br>Votes</div>
            <div class="answers">0<br>Answers</div>
            <div class="topic">The question topic goes here The question topic goes here The question topic goes here</div>
            <div class="details">asked by name | edit | delete</div>    
        </div>
        <hr>
        <div class="question_block">
            <div class="votes">0<br>Votes</div>
            <div class="answers">0<br>Answers</div>
            <div class="topic">The question topic goes here The question topic goes here The question topic goes here</div>
            <div class="details">asked by name | edit | delete</div>    
        </div>
        <hr>
        <div class="question_block">
            <div class="votes">0<br>Votes</div>
            <div class="answers">0<br>Answers</div>
            <div class="topic">The question topic goes here The question topic goes here The question topic goes here</div>
            <div class="details">asked by name | edit | delete</div>    
        </div>-->

    </div>
</body>
</html>
