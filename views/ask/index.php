<?php
    if (isset($data["question"])){
        $question = $data["question"];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Simple StackExchange</title>
    <link href="/assets/css/ask.css" rel="stylesheet">
</head>

<body>
    <header>
        Simple StackExchange
    </header>

    <section id="ask">
        <div class='title'>
            What's Your Question ?
        </div>
        <hr>
        <form id="question-form">
            <div>
                <input id="name" type="text" placeholder="Name" value="<?php echo $question->by ?>" required>
            </div>
            <div>
                <input id="email" type="email" placeholder="Email" value="<?php echo $question->email ?>" required>
            </div>
            <div>
                <input id="topic" type="text" placeholder="Question Topic" value="<?php echo $question->topic ?>" required>
            </div>
            <div>
                <textarea id="content" placeholder="Content" rows="10" required><?php echo $question->content ?></textarea>
            </div>
            <div>
                <div>
                    <a href="#" class="btn post-btn">Post</a>
                </div>
            </div>
        </form>
        <?php
            if (isset($question)){
                echo '<input type="hidden" id="question-id" data-id="', $question->id, '">';
            }
        ?>
    </section>
        
    
    <script src="/assets/js/ask.js"></script>
</body>

</html>