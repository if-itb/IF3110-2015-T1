<!DOCTYPE html>
<head>
    <link rel ="stylesheet" type="text/css" href="Index.css">
    <title>Simple StackExchange</title>

</head>

<body>
    <div id = "container">
        <div id  = "header">
            <span id  = "logo"> Simple StackExchange </span>
            <span id = "search">
                <input class = "searchbar" type = "text"/>
                <input class = "button" type = "submit" value="Search"/>
                <p>Cannot find what you are looking for? <a class="y_link" href = "AddQuestion.php">Ask here</a></p>
            </span>
        </div>
        <div id = "content">
            <h3>Recently Asked Questions</h3>
            <?php
            $username = 'root';
            $password = '';
            $database = 'stackex';
            mysql_connect('localhost', $username, $password);
            @mysql_select_db($database) or die("Unable to Select Database");

            $query = "SELECT * FROM questions";
            $result = mysql_query($query);
            $num = mysql_num_rows($result);
            $i = 0;
            while($i<$num){
                $topic = mysql_result($result, $i,"topic");
                $content = mysql_result($result, $i,"content");
                $author = mysql_result($result, $i,"author");
                $vote = mysql_result($result,$i,"vote");
                $id = mysql_result($result,$i,"ID");
                $s_query = "SELECT * FROM answers WHERE A_ID = $id";
                $s_result = mysql_query($s_query);
                $num_answers = mysql_num_rows($s_result);
                echo"<p> Topic = $topic</p>";
                echo"<p> Content = $content</p>";
                echo"<p> Author = $author</p>";
                echo"<p>Answers = $num_answers</p>";
                echo"<p>vote = $vote</p>";
                $i++;
            }
            mysql_close();
            ?>
        </div>
        <div id = "footer">

        </div>
    </div>
<body>