<?php include( 'template/header.php' ); ?>

  <div class="outer-container">

    <header class="main-title">
      <h1>Stack<span>Exchange<span></h1>
    </header>

    <form action="" method="GET" id="searchForm">
      <input type="text" placeholder="Search...">
      <input type="submit" value="Search">
    </form>

    <p class="ask-here">Can't find what you are looking for? <a href="">Ask here</a></p>

    <div class="inner-container">

      <div class="question-header">
        <h1>What's your question?</h1>
      </div>

      <div class="row">

        <div class="col-12">

          <div class="form-wrapper">
            <form id="askForm" action="" method="POST">
              <div class="form-field">
                <label for="name">Name</label>
                <input id="name" type="text" placeholder="Name">
              </div>

              <div class="form-field">
                <label for="email">Email</label>
                <input id="email" type="text" placeholder="Email">
              </div>

              <div class="form-field">
                <label for="title">Question Topic</label>
                <input id="title" type="text" placeholder="Question Topic">
              </div>

              <div class="form-field">
                <label for="content">Content</label>
                <textarea placeholder="Your question content goes here"></textarea>
              </div>
            </form>
          </div>

        </div> <!-- .col -->

      </div> <!-- .row -->

    </div> <!-- .inner-container -->

  </div> <!-- .outer-container -->

<?php include( 'template/footer.php' ); ?>
