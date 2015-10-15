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
        <link rel="stylesheet" type="text/css" href="./css/style.css">
    </head>
    
    <body>
        <a href="index.php"><h1>Bukan StackExchange</h1></a>
        <div>
            <form name="searchform" action="index.php" method="get" onsubmit="return validateField('searchform','searchbox')">
                <input id="search" type="text" name="search" value="<?php echo $keyword ?>">
                <input type="submit" value="Search">
            </form><br>
            <p>Cannot find what you're looking for? <a href="ask.php" id="ask">Ask here</a></p>
        </div>
        
        
        <?php 
            if (count($questions) === 0) {
                if (isset($_GET['search'])) {
                    echo "<p>No question matches your query.</p>";
                } else {
                    echo "<p>No question yet.</p>";
                }
            } else {
                echo "<h3>Recently Asked Questions</h3>";
            }
        ?>
            
        <?php foreach ($questions as $question) : ?>
        <hr>
        
        <div class="float_left" id="vote_count">
            <?php echo $question['vote'] ?>
            <br>
            Votes
        </div>        
        
        <div class="float_left" id="ans_count">
            <?php echo $question['answer_count'] ?>
            <br>
            Answers
        </div>
        
        <a href="question.php?id=<?php echo $question['question_id'] ?>">
            <div id="topic"><?php echo $question['topic'] ?></div>
	</a>
        
        <br>
        
        <div class="content" id="i_content">
            <?php 
                if (strlen($question['content']) > 300) {
                    echo substr($question['content'], 0, 310) . '...';
                } else {
                    echo $question['content'];
                }
            ?>
        </div>
        
        <div id="asked">
            asked by <span id="name"><?php echo $question['name'] ?> (<?php echo $question['email'] ?>)</span> |
            <a id="edit" href="edit.php?id=<?php echo $question['question_id'] ?>"> edit </a> | 
            <a id="delete" href="delete.php?id=<?php echo $question['question_id'] ?>">
                delete
            </a>
        </div>
        
        <?php endforeach; ?>
        
        <hr>
    </body>
</html>
