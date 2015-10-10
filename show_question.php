<?php
    $id = $_GET['id'];
    //$question = getQuestion($id);
    $question['name'] = "Albert";
    $question['topic'] = "IF";
    $question['content'] = "Albert Tri Adrian";
    $question['email'] = "alberttri23@gmail.com";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">

    <script type="text/javascript" src="script.js"></script>

    <title>Simple StackExchange</title>

</head>
<body>
<div id = "container">
    <div id="header">
      <p id="logo">Simple StackExchange</p>
    </div>

    <div id= "content">
      <p class="content_title"><?php echo $question['topic']; ?></p>
      <div class="question_detail">
        <div id="vote_icon">
          <span class="vote">
            <img id="vote_up" src="up_arrow.png">
            <?php echo 1 . "\n";?>
            <img id="vote_down" src="down_arrow.png">
          </span>
        </div>    
        <div class="mid-right">
          <p><?php echo $question['content']; ?></p>
        </div>
        <div class="right" style="float:right;">
          asked by <?php echo $question['name']; ?> at datetime | 
          <a class='orange_link' href='create_question.php?id=$id'>edit</a> |
          <a class='red_link' href=''>delete</a>          
        </div>
      </div>
    </div>

    <div id= "content">
      <p class="content_title">1 Answer</p>
      <div class="question">
        <div id="vote_icon">
          <span class="vote">
            <img id="vote_up" src="up_arrow.png">
            <?php echo 1 . "\n";?>
            <img id="vote_down" src="down_arrow.png">
          </span>
        </div>    
        <div class="mid-right">
          <p>BLAbajfhajkhfdsjjfdfs;adjfahkjdfakfshdd
            shkjfdshhfglhaglhakjhgjahdgkjhaskljghajksghjahghaflasjfjdashkjdsghasgjhasjkghkshfdkashdghasfjkhsjalklhdgjdaghajkshfahgklkjghl</p>
        </div>
        <div class="right" style="float:right;">
          asked by name at datetime | 
          <a class='orange_link' href=''>edit</a> |
          <a class='red_link' href=''>delete</a>          
        </div>
      </div>
    </div>

      <p class="answer_title">Your Answer</p>
      <!--javascript Form Validation -->
      <form name="answer_form" id="answer" action="" onsubmit="return validateAnswerForm()" method="post"  > 
         <input type="text" name="name" placeholder="Name">
         <input type="text" name="email" placeholder="Email" >
         <textarea name="content" placeholder="Content"></textarea>
         <input type="submit" class="submitButton" value="Post"> 
        
      </form>
    </div>

    <div id="footer">
    </div>
    
</div>
</body>

</html>
