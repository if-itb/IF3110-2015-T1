<?php
require_once("./sql/mysql.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type="text/css" href="css/style.css">
    <h1> Simple Stack Exchange </h1>
</head>
    <div class="search">
        <div class="container">
            <form action="index.php" method="GET">
                <input type="text"  id="search" placeholder="Search question topic or content here...">
                <input type="image" src="img/search.png" id="submit">
            </form>
        </div>
        <p class="cannot">Cannot find what you are looking for? <a href="ask.php" >Ask here</a></p>
    </div>

<div class="question_list">
    <h3>Recently Asked Questions</h3>
    <div class="question">
        <hr>
        <div class="row" align="center">The question topic goes here</div>
        <div>
        <table>
            <tr>
                <td class="td">0<br>Votes</td>
                <td class="td">0<br>Answers</td>
            </tr>
        </table>
        </div>
        <div class="creator">asked by
            <span class="creator_name">name</span> |
            <span class="creator_edit"> edit </span>|
            <span class="creator_edit">delete</span>
        </div>
    </div>

</div>
</html>


