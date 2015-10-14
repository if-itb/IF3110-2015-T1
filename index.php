<?php
	require_once("./mysql/retrieve_questions.php");
        $keyword = "";
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
        }
        $questions = retrieveQuestions($keyword);
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
            <form name="searchform" action="index.php" method="get" onsubmit="return validateField('searchform','searchbox')">
                <input type="text" name="search">
                <input type="submit" value="Search">
            </form>
        </div>
        <div>Cannot find what you're looking for? <a href="ask.php">Ask here</a></div>
        
        
        <h3>Recently Asked Questions</h3>
        <?php 
            if (count($questions) === 0) {
                if (isset($_GET['search'])) {
                    echo "No question matches your query.";
                } else {
                    echo "No question yet.";
                }
            }
        ?>
        <?php foreach ($questions as $question) :
            echo $question['name'] . "<br>";
            echo $question['email'] . "<br>";
        ?>
        <a href="question.php?id=<?php echo $question['question_id'] ?>">
            <?php echo $question['topic'] . "<br>" ?>
	</a>
        <?php  
            echo $question['content'] . "<br>";
            echo $question['vote'] . "<br>";
            echo $question['answer_count'] . "<br>";
            echo $question['time'] . "<br>";
        ?>
        <a href="edit.php?id=<?php echo $question['question_id'] ?>">
            Edit | 
	</a>
        <a href="delete.php?id=<?php echo $question['question_id'] ?>">
            Delete
        </a>
        <br><br>
        <?php
        endforeach; 
        ?>
        
    </body>
</html>
