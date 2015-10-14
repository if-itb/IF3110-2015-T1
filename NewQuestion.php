<!DOCTYPE html>
<html>
<title>HTML Tutorial</title>

<head>
    <link rel="stylesheet" type="text/css" href="SSEstylesheet.css">
</head>

<body>
<center>
    <a href="dashboardPHP.php" id="dashboard">Simple StackExchange</a>

    <h4 class="relative1">
        What's your question?
    </h4>

    <hr width="770">

    <form action="InputNewQuestion.php" method="post" >
        <input type="text" name="Name" value="Name" size="100"><br>
        <input type="text" name="Email" value="Email"size="100"><br>
        <input type="text" name="QuestionTopic" value="Question Topic" size="100"><br>
        <textarea cols="91" rows="4" type="text" name="Content">Content
        </textarea>
        <br><br>
        <input class="textboxposquestion" type="submit" value="post">
    </form>



</center>

</body>
</html>