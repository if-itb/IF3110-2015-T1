<!DOCTYPE html>
<html>
    <head>
        <title>list</title>
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript" src="script.js"></script>
    </head>
    <body>
        <div class="board">
            <a href="list.php"><h1>Simple StackExchange</h1></a>
            <form action="search_list.php" method="post">
                <input type="text" class="boxsearch" placeholder="Search.." name="search">
                <input type="submit" class="posisisearch" value="Find" name="completedsearch">
            </form>       

            <br>
            <h5>Cannot find what you are looking for? 
            <a href="create.php" ><span class="ask">Ask here</span></a></h5>

            Recently Asked Questions

            <?php
                include ("list_replace.php");
            ?>
        </div>
    </body>
</html>