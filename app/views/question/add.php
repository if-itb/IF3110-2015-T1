
<div class="inner-container">

    <div class="question-header">
        <h1>What's your question?</h1>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="form-wrapper">
                <form id="askForm" action="<?= ROOT_URL; ?>/question/add" method="POST">
                    <div class="form-field">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" placeholder="Name">
                    </div>

                    <div class="form-field">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" placeholder="Email">
                    </div>

                    <div class="form-field">
                        <label for="title">Question Topic</label>
                        <input id="title" name="topic" type="text" placeholder="Question Topic">
                    </div>

                    <div class="form-field">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" placeholder="Your question content goes here"></textarea>
                    </div>

                    <input type="submit" value="Post">
                </form>
            </div>

        </div> <!-- .col -->
    </div> <!-- .row -->
    
</div> <!-- .inner-container -->

