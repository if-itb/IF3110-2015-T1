<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web for Questions and Answers">
        <meta name="author" content="13513095 Fitra Rahmamuliani">
        <link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Simple Stack Exchange</title>
    </head>
    <body>
        <div class="container">
            <div class="title">Simple StackExchange</div>
            <div class="subq black">What's your question?</div>
            <form class="formsearch createquestion" method="post" action="insert.php">
                <input type="text" id="createname" name="createname" placeholder="Name" />
                <input type="text" id="createemail" name="createemail" placeholder="Email" />
                <input type="text" id="createtopic" name="createtopic" placeholder="Question Topic" />
                <textarea type="text" id="createcontent" name="createcontent" placeholder="Content"></textarea>
                    <button type="submit" name="submit">Post</button>
            </form>
        </div>
    </body>
</html>