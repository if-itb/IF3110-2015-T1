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


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    ?>



</center>

</body>
</html>
