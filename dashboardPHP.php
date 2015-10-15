<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="SSEstylesheet.css">
</head>

<body>
<Center>
    <br>
    <a href="dashboardPHP.php" id="dashboard">Simple StackExchange</a>
    <br><br>

    <form action="demo_form.asp" >
        <input type="text" name="Search" value="">

        <input type="submit" value="search"><br>
    </form>

    <p>Cannot find what you are looking for?
        <a href="NewQuestion.php">ask here</a>
    </p>

    <h4 class="relative1">
        Frequently Asked Question
    </h4>

    <?php

    include 'QuestionLoop.php';

    ?>

    <hr width="770">

    <br>

</center>

</body>
</html>
