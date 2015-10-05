<!DOCTYPE html>
<html>
<head>
    <title>Exchange Lyz</title>
</head>
<body>
    <div class="header">Exchange Lyz
    </div>
    <form action="search.php" method="post">
        <input type="text" id="search_query" autofocus>
        <input type="submit" value="Search"><br>
        Cannot find what you are looking for? <a href="ask.php">Ask here</a>
    </form>
    <div class="question">
        <h1>Recently Asked Questions</h1>
        <hr>
        <?php
            include("get_question.php");
        ?>
    </div>
</body>
</html>
