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
            <div class="subq black"><a href="#">The question topic goes here</a></div>
            <div class="question">
                <div class="votepart">
                    <div class="voteup"></div>
                    <div class="votenumber">0</div>
                    <div class="votedown"></div>
                </div>
                <div class="questionpart partmedium">
                    <div class="qcontent medium">
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
                <div class="labelunder labelmedium">
                    <p class="ab">asked by </p>
                    <a href="#" class="askedname">username</a>
                    <p class="ab">at</p>
                    <p class="date">datetime</p>
                    <a href="#" class="edit">edit </a>
                    <a href="#" class="delete">delete </a>
                </div>
            </div>
            <div class="subq black">
                <div class="answernum">1</div>
                    Answer
            </div>
            <div class="raq">
                <div class="votepart">
                    <div class="voteup"></div>
                    <div class="votenumber">0</div>
                    <div class="votedown"></div>
                </div>
                <div class="questionpart partmedium">
                    <div class="qcontent medium">
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
                <div class="labelunder labelmedium">
                    <p class="ab">asked by </p>
                    <a href="#" class="askedname">username</a>
                    <p class="ab">at</p>
                    <p class="date">datetime</p>
                </div>
            </div>
            <div class="subq abu">Your Answer</div>
            <form class="formsearch createquestion">
                <input type="text" id="createname" name="createname" placeholder="Name" />
                <input type="text" id="createemail" name="createtopic" placeholder="Email" />
                <textarea type="text" id="createcontent" name="createcontent" placeholder="Content"></textarea>
                    <button type="submit">Post</button>
            </form>
        </div>
    </body>
</html>