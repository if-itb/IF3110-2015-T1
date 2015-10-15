<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Simple StackExchange</title>
    <link href="/assets/css/answer.css" rel="stylesheet">
</head>

<body>
    <?php 
        $question = $data["question"];
        $answers = $data["answers"];
    ?>

    <header>
        Simple StackExchange
    </header>

    <section id="question">
        <table>
            <thead>
                <th colspan="2">
                    <?php 
                        echo $question->topic;
                    ?>
                </th>
            </thead>
            <tbody>
                <tr id="question-id" data-id="<?php echo $question->id; ?>">
                    <td width="50">
                        <div class="question-arrow-up"></div>
                        <div class="votes">
                            <?php echo $question->votes; ?>
                        </div>
                        <div class="question-arrow-down"></div>
                    </td>
                    <td>
                        <div>
                            <?php echo $question->content; ?>
                            
                            <div class="action">
                                Asked by <?php echo $question->by; ?> at <?php echo $question->create_time; ?> | <a href='#' class='edit'>Edit</a> | <a href='#' class='delete'>Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

    <section id="answer">
        <table>
            <thead>
                <th colspan="2">
                    <span><?php echo sizeof($answers) ?></span> Answer
                </th>
            </thead>
            <tbody>
                <?php
                    if (sizeof($answers) > 0) {
                        foreach ($answers as $answer){                  
                            echo '<tr data-id="' , $answer->id , '">
                                <td width="50">
                                    <div class="answer-arrow-up"></div>
                                    <div class="votes">' , $answer->votes , '</div>
                                    <div class="answer-arrow-down"></div>
                                </td>
                                <td>
                                    <div>' , $answer->content ,
                                        '<div class="action">
                                            Answered by <span class="name">' , $answer->by , '</span> at ' , $answer->create_time , '
                                        </div>
                                    </div>
                                </td>
                            </tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </section>

    <section id="your-answer">
        <div class="title">
            Your Answer
        </div>

        <form id="answer-form">
            <div>
                <input id="name" type="text" placeholder="Name">
            </div>
            <div>
                <input id="email" type="email" placeholder="Email">
            </div>
            <div>
                <textarea id="content" placeholder="Content" rows="10"></textarea>
            </div>
            <div>
                <div>
                    <a href="#" class="btn post-btn">Post</a>
                </div>
            </div>
        </form>
    </section>

    <script src="/assets/js/answer.js"></script>
</body>

</html>