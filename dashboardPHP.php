<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="SSEstylesheet.css">
</head>

<body>
<Center>
    <h1>Simple StackExchange</h1>

    <form action="demo_form.asp">
        <input type="text" name="LastName" value=""><input type="submit" value="search"><br>
    </form>

    <p>Cannot find what you are looking for?
        <a href="http://www.google.com">ask here</a>
    </p>

    <h4 class="relative">
        Frequently Asked Question
    </h4>

    <?php

    include 'QuestionLoop.php';

    ?>

    <br>

</center>

</body>
</html>
