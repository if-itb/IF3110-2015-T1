
<div class="inner-container">

    <div class="question-header">
        <h1>Edit Your Question</h1>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="form-wrapper">
                <form id="questionForm" action="<?= ROOT_URL; ?>/question/edit" method="POST">
                    <input type="hidden" name="id_question" value="<?= $data['question']->id_question; ?>">
                    <div class="form-field">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" value="<?= $data['question']->name; ?>" placeholder="Name">
                    </div>

                    <div class="form-field">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" value="<?= $data['question']->email; ?>" placeholder="Email">
                    </div>

                    <div class="form-field">
                        <label for="topic">Question Topic</label>
                        <input id="topic" name="topic" type="text" value="<?= $data['question']->topic; ?>" placeholder="Question Topic">
                    </div>

                    <div class="form-field">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" placeholder="Your question content goes here"><?= $data['question']->content; ?></textarea>
                    </div>

                    <input type="submit" id="submitQuestionForm" class="btn-submit" value="Post">
                </form>
            </div>

        </div> <!-- .col -->
    </div> <!-- .row -->
    
</div> <!-- .inner-container -->

