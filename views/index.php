<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Simple StackExchange</title>
    <link href="/assets/css/index.css" rel="stylesheet">
</head>

<body>
    <header>
        Simple StackExchange
    </header>

    <section id="search">
        <input type="text" />
        <a href="#" class="btn">Search</a>
        <div class="ask-title">
            Cannot find what you are looking for? <a href="/ask" class="ask">Ask here</a>
        </div>
    </section>
    <section id="recent">
        <table class="question-table">
            <thead>
                <th colspan="3">
                    Recently Asked Questions
                </th>
            </thead>
            <tbody>
                <?php
                    $maxLen = 263;

                    if (sizeof($data['questions']) > 0) {
                        foreach ($data['questions'] as $question){

                            if (strlen($question->content) > $maxLen){
                                $question->content = substr($question->content, $maxLen) . ' ...';
                            }

                            echo '<tr data-id=' . $question->id . '><td width="75"> ', $question->votes ,' <br>Votes</td><td width="75"> ', $question->answers, ' <br>Answers</td><td><div class="questions-body-wrapper"><a href="#" class="topic"> ', $question->topic, ' </a><br/><br/><span> ' . $question->content . '</span><div class="action"> Asked by <span class="name"> ', $question->by, ' </span> at ', $question->create_time ,' | <a href="#" class="edit">Edit</a> | <a href="#" class="delete">Delete</a></div></div></td></tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </section>

    <script src="/assets/js/index.js"></script>
</body>

</html>