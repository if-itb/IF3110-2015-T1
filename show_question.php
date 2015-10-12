    <script type="text/javascript" src="script.js"></script>

<?php
    require("./controller.php");
    if (isset($_GET['id'])){
      $id = $_GET['id'];    
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

          $new_answer = array();
          $new_answer['q_id'] = $id;
          $new_answer['name'] = $_POST['name'];
          $new_answer['email'] = $_POST['email'];
          $new_answer['content'] = $_POST['content'];

          postAnswer($new_answer);
        }

        $question = getQuestion($id);
        $answers = getAnswers($id);    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">

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
            <a href="javascript:voteQuestion(<?php echo $question['q_id']?>,true,true);"><img id="vote_up" src="up.png" ></a>
            <div id ="q_vote"><?php echo $question['vote']; ?></div>
            <a href="javascript:voteQuestion(<?php echo $question['q_id']?>,true,false);"><img id="vote_down" src="down_arrow.png"></a>
          </span>
        </div>    
        <div class="mid-right">
          <p><?php echo $question['content']; ?></p>
        </div>
        <div class="right" style="float:right;">
          asked by <?php echo $question['name']; ?> at <?php echo $question['create_date']; ?> | 
          <a class='orange_link' href='create_question.php?id=$id'>edit</a> |
          <a class='red_link' href=''>delete</a>          
        </div>
      </div>
    </div>

    <div id= "content">
      <p class="content_title"><?php echo getAnswerCount($id); ?> Answers</p>
    <?php 
        foreach ($answers as $answer) {
          $left =  "<div id='vote_icon'>
                      <span class='vote'>
                        <a href=\"javascript:voteAnswer(".$answer['q_id'].",".$answer['a_id'].",false,true)\"><img id='vote_up' src='up.png'></a><div id=\"a_vote-".$answer['a_id']."\">" .$answer['vote']. 
                        "</div><a href=\"javascript:voteAnswer(".$answer['q_id'].",".$answer['a_id'].",false,false)\"><img id='vote_down' src='down_arrow.png'></a>
                      </span>
                    </div>";

          $mid = "<div class='mid-right'><p>" . $answer['content'] ."</p></div>";

          $right = "<div class='right' style='float:right;''>
                        asked by name at " .$answer['create_date']. " | 
                    </div>";

          $answer_content = "<div class='question'>" .$left. $mid . $right . "</div>";

          echo $answer_content;
        }
     ?>
    
    </div>
      <p class="answer_title">Your Answer</p>
      <!--javascript Form Validation -->
      <form name="answer_form" id="answer" action="show_question.php?id=<?php echo $id;?>" onsubmit="return validateAnswerForm()" method="post"  > 
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
