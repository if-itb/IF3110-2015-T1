<!DOCTYPE HTML>
<html>
    <head>
        <title>Stack Exchange</title>

        <link rel="stylesheet" type="text/css" href="../assets/css/base.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Simple StackExchange</h1>

            <h2><?= $thread["topic"] ?></h2>
            <div class="thread">
                <div class="row">

                    <div class="span-1">
                        <div class="arrow-up" onclick="upvoteThread(<?= $thread["id"] ?>)"></div>
                        <div class="text-center">
                            <h2 id="question-vote"><?= $thread["vote"] ?></h2>
                        </div>
                        <div class="arrow-down" onclick="downvoteThread(<?= $thread["id"] ?>)"></div>
                    </div>

                    <div class="span-9">
                        <?= $thread["content"] ?>
                        <p class="text-right footer">
                            Asked by <?= $thread["author"] ?> at <?= $thread["created_at"] ?> | <a href="/thread/update?id=<?= $thread["id"] ?>">Edit</a> | <a href>Delete</a>
                        </p>
                    </div>
                </div>
            </div>

            <h2><?= $thread["answer"] ?> Answer</h2>

            <?php foreach($answers as $answer): ?>
                <div class="thread">
                    <div class="row">

                        <div class="span-1">
                            <div class="arrow-up" onclick="upvoteAnswer(<?= $answer["id"] ?>)"></div>
                            <div class="text-center">
                                <h2 id="answer-vote-<?= $answer["id"] ?>"><?= $answer["vote"] ?></h2>
                            </div>
                            <div class="arrow-down" onclick="downvoteAnswer(<?= $answer["id"] ?>)"></div>
                        </div>

                        <div class="span-9">
                            <div>
                                <?= $answer["content"] ?>
                            </div>
                            <p class="text-right footer">
                                Answered by <?= $answer["author"] ?> at <?= $answer["created_at"] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <hr>
            <h2>Your Answer</h2>
            <form id="answer-form" method="POST" action="/answer/add.php?thread_id=<?= $thread["id"] ?>">
                <input id="authorInput" class="form" type="text" name="author" placeholder="Name">
                <input id="authorEmailInput" class="form" type="text" name="author_email" placeholder="Email">
                <textarea id="contentInput" class="form" type="text" name="content" placeholder="Content"></textarea>

                <div class="text-right">
                    <button onclick="submitAnswerForm()" type="button" class="btn">Post</button>
                </div>
            </form>

        </div>

        <script type="text/javascript" src="/assets/js/thread.js"></script>
    </body>
</html>
