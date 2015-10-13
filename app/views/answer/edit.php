
<div class="inner-container">

    <div class="question-header">
        <h1>Edit Your Answer</h1>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="form-wrapper">
                <form id="answerForm" action="<?= ROOT_URL; ?>/answer/edit" method="POST">
                    <input type="hidden" name="id_answer" value="<?= $data['answer']->id_answer; ?>">
                    <input type="hidden" name="id_question" value="<?= $data['answer']->id_question; ?>">
                    <div class="form-field">
                        <label for="name">Name</label>
                        <input id="name" type="text" name="name" value="<?= $data['answer']->name; ?>" placeholder="Name">
                    </div>

                    <div class="form-field">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email" value="<?= $data['answer']->email; ?>" placeholder="Email">
                    </div>

                    <div class="form-field">
                        <label for="content">Answer</label>
                        <textarea id="content" name="content" placeholder="Your answer goes here"><?= $data['answer']->content; ?></textarea>
                    </div>

                    <input type="submit" id="submitAnswerForm" class="btn-submit" value="Post">
                </form>
            </div>

        </div> <!-- .col -->
    </div> <!-- .row -->
    
</div> <!-- .inner-container -->

