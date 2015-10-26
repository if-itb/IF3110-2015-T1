<!DOCTYPE html>
<head>
    <link rel ="stylesheet" type="text/css" href="Assets/css/Index.css">
    <title>Simple StackExchange</title>
</head>

<body>
    <div id = "container">
        <div id  = "header">
            <a id  = "logo" href = "index.php"> Simple StackExchange </a>
            <span id = "search">
                <form action = "index.php" method="get">
                    <input name ='search' class = "searchbar" type = "text"/>
                    <input class = "button" type = "submit" value="Search"/>
                </form>
                <p>Cannot find what you are looking for? <a class="y_link" href = "AskQuestion.php">Ask here</a></p>
            </span>
        </div>
        <div id = "content">
            <h3>Recently Asked Questions</h3>
            <?php require 'ShowQuestions.php'?>
        </div>
        <div id = "footer">

        </div>
    </div>
<body>