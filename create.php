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
            <div class="subq">What's your question?</div>
            <form class="formsearch createquestion">
                <label for="createname">Name</label>
                <input type="text" id="createname" name="createname" placeholder="Put you name here" />
                <label for="createemail">Email</label>
                <input type="text" id="createemail" name="createtopic" placeholder="email@email.com" />
                <label for="createtopic">Your Question Topic</label>
                <input type="text" id="createtopic" name="createtopic" placeholder="Question Topic" />
                <label for="createcontent">Content</label>
                <textarea type="text" id="createcontent" name="createcontent" placeholder="Your Question content"></textarea>
                    <button type="submit">Post</button>
            </form>
        </div>
    </body>
</html>