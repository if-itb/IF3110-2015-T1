<!-- Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web
Membuat website seperti Stack Exchange
Author: Irene Wiliudarsan (13513002) -->
<!-- File: question-detail.php  -->

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
      <div class="stacked" id="question-detail">
        <div class="subtitle">
          The Question topic goes here
        </div>
        <!-- Question Content -->
        <div>
          <span class="vote-number">
            <a href="">
              up<br>
            </a>
            (number)<br>
            <a href="">
              down<br>
            </a>
          </span>
          <span class="question-answer-content">
            The question goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis dapibus nunc, vel vestibulum massa dapibus et. Curabitur quis est metus. Curabitur varius dui ac ex tempor luctus. Vestibulum ut ornare tellus. Integer rhoncus, mauris sed tempus cursus, orci arcu eleifend tortor, quis scelerisque tellus lorem vel neque. Donec ut odio lacinia, ultricies mauris quis, egestas nisl. Suspendisse potenti.
          </span>
        </div>
        <!-- Question Menu -->
        <div class="right-position">
          asked by (username) at (datetime)|
          <span class="edit">
            <a href="">
              edit
            </a>
          </span>
          |
          <span class="delete">
            <a href="">
              delete
            </a>
          </span>
        </div>
      </div>
      
      <!-- Answers -->
      <div class="stacked">
        <div class="subtitle">
          (Number) Answer
        </div>
        <div>
          <span class="vote-number">
            up<br>
            (number)<br>
            down
          </span>
          <span class="question-answer-content">
            The answer content goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis dapibus nunc, vel vestibulum massa dapibus et. Curabitur quis est metus. Curabitur varius dui ac ex tempor luctus. Vestibulum ut ornare tellus. Integer rhoncus, mauris sed tempus cursus, orci arcu eleifend tortor, quis scelerisque tellus lorem vel neque. Donec ut odio lacinia, ultricies mauris quis, egestas nisl. Suspendisse potenti.
          </span>

          <!-- Answer Form -->
          <h2>Your Answer</h2>
          <form id="answer-form" action="question-detail.php" method="post">
            <input class="short-text" name="name" type="text" placeholder="Name">
            <input class="short-text" name="email" type="text" placeholder="Email">
            <textarea name="content" placeholder="Content" rows="10" cols="50"></textarea>
            <input class="button" type="submit" value="Post">
          </form>
        </div>
      </div>
    </div>

    <!-- JavaScript -->
  </body>
</html>