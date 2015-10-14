<html>
    <head>
        <meta charset="UTF-8">
        <title>Bukan StackExchange - Ask</title>
        <script src="./js/form_validation.js"></script>
    </head>
    <body>
        <div align="center">
            <h1>Bukan StackExchange</h1>
        </div>
        <div>
            <h2>What's your question?</h2>
        </div>
        <div>
            <form name="question" action="./mysql/post_question.php" onsubmit="return validateQuestionForm('question')" method="post">
                <input type="text" onfocus="if (this.value=='Name') this.value = ''" onblur="if (this.value=='') this.value = 'Name'" value="Name" name="Name"><br>
                <input type="text" onfocus="if (this.value=='E-mail') this.value = ''" onblur="if (this.value=='') this.value = 'E-mail'" value="E-mail" name="Email"><br>
                <input type="text" onfocus="if (this.value=='Topic') this.value = ''" onblur="if (this.value=='') this.value = 'Topic'" value="Topic" name="Topic"><br>
                <input type="text" onfocus="if (this.value=='Content') this.value = ''" onblur="if (this.value=='') this.value = 'Content'" value="Content" name="Content"><br>
                <input type="submit" value="Post">
            </form>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
