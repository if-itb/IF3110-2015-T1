<!-- Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web
Membuat website seperti Stack Exchange
Author: Irene Wiliudarsan (13513002) -->
<!-- File: answer-question-detail.php  -->

<!DOCTYPE html>
<html>
  <head>
    <title>Question Detail</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
  </head>
  <body>
    <!-- Title -->
    <div class="title">
      Simple StackExchange
    </div>

    <div class="content">
      <!-- Question -->
      <div class="stacked">
        <div class="subtitle">
          The Question topic goes here
        </div>
        <!-- Question Content -->
        <div class="same-height-row border-bottom">
          <div class="vote-number">
            <a href="">
              <img class="small-icon" src="../img/up.png"/><br>
            </a>
            <div class="big-number">
              (number)
            </div>
            <a href="">
              <img class="small-icon" src="../img/down.png"/><br>
            </a>
          </div>
          <div class="right-position">
            <div class="answer-question-detail">
              The question goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis dapibus nunc, vel vestibulum massa dapibus et. Curabitur quis est metus. Curabitur varius dui ac ex tempor luctus. Vestibulum ut ornare tellus. Integer rhoncus, mauris sed tempus cursus, orci arcu eleifend tortor, quis scelerisque tellus lorem vel neque. Donec ut odio lacinia, ultricies mauris quis, egestas nisl. Suspendisse potenti.
            </div>
            <!-- Asked by -->
            asked by (username) at (datetime) |
            <a class="yellow" href="">
              edit
            </a>
            |
            <a class="red" href="">
              delete
            </a>
          </div>
        </div>
      </div>
      
      <!-- Answers -->
      <div class="stacked">
        <div class="subtitle">
          (Number) Answer
        </div>
        <div class="same-height-row border-bottom">
          <div class="vote-number">
            <a href="">
              <img class="small-icon" src="../img/up.png"/><br>
            </a>
            <div class="big-number">
              (number)
            </div>
            <a href="">
              <img class="small-icon" src="../img/down.png"/><br>
            </a>
          </div>
          <div class="right-position">
            <div class="answer-question-detail">
              The answer content goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis dapibus nunc, vel vestibulum massa dapibus et. Curabitur quis est metus. Curabitur varius dui ac ex tempor luctus. Vestibulum ut ornare tellus. Integer rhoncus, mauris sed tempus cursus, orci arcu eleifend tortor, quis scelerisque tellus lorem vel neque. Donec ut odio lacinia, ultricies mauris quis, egestas nisl. Suspendisse potenti.
            </div>
            answered by (username) at (datetime)
          </div>
        </div>
      </div>

      <!-- Answer Form -->
      <div class="stacked">
        <div id="answer-form-title">
          Your Answer
        </div>
        <form class="right" id="answer-form" action="question-detail.php" method="post">
          <input class="full-length" name="name" type="text" placeholder="Name">
          <input class="full-length" name="email" type="text" placeholder="Email">
          <textarea class="full-length" name="content" placeholder="Content" rows="10" cols="50"></textarea>
          <input class="button" type="submit" value="Post">
        </form>
      </div>
    </div>

    <!-- JavaScript -->
  </body>
</html>