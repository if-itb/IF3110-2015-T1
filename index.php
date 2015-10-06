<?php require_once "header.php"; ?>
    <div class="div-search">
        <form action="search.php" method="get">
            <input class="txt-search" type="search" name="q" placeholder="Search..." autofocus required>
            <input class="btn-search" type="submit" value="Search"><br>
            Cannot find what you are looking for? <a href="ask.php">Ask here</a>
        </form>
    </div>
    <div class="question-list">
        <h3>Recently Asked Questions</h3>
        <hr class="heading">
        <?php
            require_once "function.php";
            displayAllQuestionList();
        ?>
    </div>
</body>
</html>
