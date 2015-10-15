<!DOCTYPE HTML>
<html>
    <head>
        <title>Stack Exchange</title>

        <link rel="stylesheet" type="text/css" href="/assets/css/base.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Simple StackExchange</h1>

            <a href="/">Home</a>
            <h2>What's Your Question?</h2>
            <hr>

            <form method="POST" id="thread-form">
                <input id="authorInput" type="text" class="form" placeholder="Name" name="author" value="<?= $thread["author"] ?>">
                <input id="authorEmailInput" type="text" class="form" placeholder="Email" name="author_email" value="<?= $thread["author_email"] ?>">
                <input id="topicInput" type="text" class="form" placeholder="Question Topic" name="topic" value="<?= $thread["topic"] ?>">
                <textarea id="contentInput" class="form" placeholder="Content" rows="5" name="content"><?= $thread["content"] ?></textarea>

                <div class="text-right">
                    <button class="btn" type="button" onclick="submitThreadForm()">Post</button>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="/assets/js/thread-form.js"></script>
    </body>
</html>