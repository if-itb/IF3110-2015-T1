<?php
  
  require("./includes/header.php");
  
  $question = array();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $question['q_id'] = $_POST['q_id'];
      $question['name'] = $_POST['name'];
      $question['email'] = $_POST['email'];
      $question['topic'] = $_POST['topic'];
      $question['content'] = $_POST['content'];

      if (isset($_GET['id'])){
        updateQuestion($question,$id);
      }
      else{
        postQuestion($question);        
      }

  }

  if (isset($_GET['id'])){
      $id = $_GET['id'];
      $question = getQuestion($id);
      $name = $question['name']; 
      $email = $question['email']; 
      $topic = $question['topic'];
      $content = $question['content'];
      $update = true;    
  }
  else{
      $id = 0;
      $name = "";
      $email = "";
      $topic = "";
      $content = "";
      $update = false;
  }

?>

<body>
  <div id = "container">
      <div id="header">
        <p id="logo">Simple StackExchange</p>
      </div>

      <div id= "content">
        <p class="content_title">What's your question?</p>
      
        <!--javascript Form Validation -->
        <form name="question_form" id="question" action="" onsubmit="return validateQuestionForm()" method="post"  > 
          <input type="hidden" name="q_id" value="<?php echo $id; ?>">
          <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
          <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
          <input type="text" name="topic" placeholder="Question Topic" value="<?php echo $topic; ?>">
          <textarea name="content" placeholder="Content"><?php echo $content; ?></textarea>
          <input type="hidden" name="q_update" value="<?php echo $update; ?>">
          <input type="submit" class="submitButton" value="<?php echo ($update)? 'Update' : 'Post'; ?>"> 
          
        </form>
      </div>

      <div id="footer">
      </div>
      
  </div>
</body>

<?php 
    include("./includes/footer.php");
?>


