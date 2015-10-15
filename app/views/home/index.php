
<div class="row">
    <div class="secondary-title col-10 col-push-1">
        <?php if (isset($_GET['s'])): ?>
            <h2>Search Result for '<?= $_GET['s']; ?>'</h2>
        <?php else: ?>
            <h2>Recently Asked Questions</h2>
        <?php endif; ?>
    </div>
</div>
    
<div class="question-list">

    <?php if ($data['questions']): ?>

        <?php foreach($data['questions'] as $key => $question): ?>

            <div class="inner-container">
                <div class="question">
                    <div class="row">
                        <div class="question-status col-3">
                            <div class="question-vote">
                                <div class="status-counts">
                                    <span><?= $question->votecounts; ?></span>
                                </div>
                                <div class="status-title">
                                    <span>vote</span>
                                </div>
                            </div>
                            <div class="question-answers">
                                <div class="status-counts">
                                    <span><?= $question->answercounts ? $question->answercounts : 0 ; ?></span>
                                </div>
                                <div class="status-title">
                                    <span>answer</span>
                                </div>
                            </div>
                        </div>
                        <div class="question-summary col-9">
                            <h2 class="question-title">
                                <a href="<?= ROOT_URL; ?>/question/<?= $question->id_question; ?>"><?= $question->topic; ?></a>
                            </h2>
                            <p><?= substr($question->content, 0, 150); ?></p>
                        </div>
                        <div class="question-meta">
                            <span>
                                Asked by
                                <span class="meta-name"><?= $question->email; ?></span> |
                                <a href="<?= ROOT_URL; ?>/question/edit/<?= $question->id_question; ?>" class="question-edit">Edit</a> |
                                <form id="deleteForm_<?= $question->id_question ?>" class="delete-form" action="<?= ROOT_URL; ?>/question/delete" method="POST">
                                    <input type="hidden" name="id_question" value="<?= $question->id_question; ?>">
                                    <input type="submit" class="form-delete" value="Delete">
                                </form>
                            </span>
                        </div>
                    </div> <!-- .row -->
                </div> <!-- .question -->
            </div> <!-- .inner-container -->

        <?php endforeach; ?>
    <?php else: ?>
        <div class="inner-container">
            <?php if (isset($_GET['s'])): ?>
                <p class="">Sorry, No result for '<?= $_GET['s']; ?>'</p>
            <?php else: ?>
                <p>No Questions</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div> <!-- .question-list -->