
<?php if ($data['question']): ?>
   <div class="inner-container">
        <div class="question-header">
            <h1><?= $data['question']->topic; ?></h1>
        </div>

        <div class="question-item">
            <div class="row">

                <div class="question-status col-2">
                    <div class="vote">

                        <div class="vote-up">
                            <a class="vote-link" href="">▲</a>
                        </div>

                        <div class="vote-counts">
                            <span>0</span>
                        </div>

                        <div class="vote-down">
                            <a class="vote-link" href="">▼</a>
                        </div>

                    </div>
                </div> <!-- .question-status -->

                <div class="question-content col-10">
                    <p><?= $data['question']->content; ?></p>
                </div>

                <div class="question-meta">
                    <span>
                        Asked by
                        Name |
                        <a href="<?= ROOT_URL; ?>/edit/<?= $data['question']->id_question ?>" class="question-edit">Edit</a> |
                        <a href="" class="question-delete">Delete</a>
                    </span>
                </div>

            </div> <!-- .row -->
        </div> <!-- .question-item -->
    </div> <!-- .inner-container -->
<?php endif; ?>

<?php if ($data['answers']): ?>
    
    <div class="row">
        <div class="answer-header col-10 col-push-1">
            <h2><?= count($data['answers']); ?> Answers</h2>
        </div>
    </div>
    
    <div class="inner-container">
        <?php foreach($data['answers'] as $answer): ?>
            <div class="answer">
                <div class="row">

                    <div class="answer-status col-2">
                        <div class="vote">
                            <div class="vote-up">
                                <a class="vote-link" href="">▲</a>
                            </div>

                            <div class="vote-counts">
                                <span>0</span>
                            </div>

                            <div class="vote-down">
                                <a class="vote-link" href="">▼</a>
                            </div>
                        </div>
                    </div> <!-- .answer-status -->

                    <div class="answer-content col-10">
                        <p>
                            <?= $answer->content; ?>
                        </p>
                    </div>

                    <div class="answer-meta">
                        <span>
                            Answered by
                            <?= $answer->name; ?> |
                            <a href="edit.php" class="question-edit">Edit</a> |
                            <a href="" class="question-delete">Delete</a>
                        </span>
                    </div>

                </div> <!-- .row -->
            </div> <!-- .answes -->
        <?php endforeach; ?>
    </div> <!-- .inner-container -->
<?php endif; ?>

<div class="inner-container">
    <div class="row">
        <div class="answer-form col-10 col-push-2">
            
            <h3 class="answer-form-header">Your Answer</h3>

            <form id="answerForm" action="<?= ROOT_URL; ?>/answer/add" method="POST">
                <input type="hidden" name="id_question" value="<?= $data['question']->id_question; ?>">
                <div class="form-field">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" placeholder="Name">
                </div>

                <div class="form-field">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" placeholder="Email">
                </div>

                <div class="form-field">
                    <label for="content">Answer</label>
                    <textarea name="content" placeholder="Your answer goes here"></textarea>
                </div>

                <input type="submit" value="Post">
            </form>

        </div> <!-- .answer-form -->
    </div> <!-- .row -->
</div> <!-- .inner-container -->


