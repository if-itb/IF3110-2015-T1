<?php
	require_once("./mysql/retrieve_questions.php");
        
        $questions = retrieveQuestions();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bukan StackExchange - Home</title>
        <script src="form_validation.js"></script>
    </head>
    
    <body>
        <div align="center">
        <h1>Bukan StackExchange</h1>
        <div>
            <form name="searchform" action="search.php" method="post" onsubmit="return validateField('searchform','searchbox')">
                <input type="text" name="searchbox">
                <input type="submit" value="Search">
            </form>
        </div>
        <div>Cannot find what you're looking for? <a href="ask.php">Ask here</a></div>
        
        
        <h3>Recently Asked Questions</h3>
        <?php if (count($questions) === 0) echo "No questions yet." ?>
        <?php foreach ($questions as $question) :
            echo $question['question_id'] . "<br>";
            echo $question['name'] . "<br>";
            echo $question['email'] . "<br>";
            echo $question['topic'] . "<br>";
            echo $question['content'] . "<br>";
            echo $question['vote'] . "<br>";
            echo $question['time'] . "<br>";
        endforeach; ?>
        
    </body>
</html>
