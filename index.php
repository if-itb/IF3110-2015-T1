<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <?php
        // put your code here
        ?>
    </body>
</html>
