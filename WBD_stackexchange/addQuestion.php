<!--/**
 * Created by PhpStorm.
 * User: Marco Orlando
 * Date: 10/9/2015
 * Time: 4:09 PM
 */

-->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Simple StackExchange</title>
    <script type = "text/javascript" src="validatorInputQuestionAnswer.js"></script>
</head>

<body>
    <div id="container">
        <div id="head">
            <span id="Judul">Simple StackExchange</span>
            <h2>What's your question?</h2>
        </div>


        <div id="body">
            <form name="myForm" action="addQuestionToDB.php" method="post" onsubmit="return validateFormQuestion()">
                <input type="text" name="name" placeholder="Name"><br>
                <input type="text" name="email" placeholder="Email"><br>
                <input type="text" name="questionTopic" placeholder="Question Topic"><br>
                <textarea name="questionContent" placeholder="Content"></textarea><br>
                <input type="submit">
            </form>
        </div>

    </div>

</body>
</html>