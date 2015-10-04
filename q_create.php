<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css" type="text/css">

    <title>Simple StackExchange</title>
</head>
<body>
  <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      //q_id will be got from url
      $q_id = isset($_GET['q_id']) ? $_GET['q_id'] : '';

      $data = ($q_id != "") ? getQuestion($q_id) : array();
      $data['name'] = !isset($data['name']) ? "" : $data['name'];
      $data['email'] = !isset($data['email']) ? "" : $data['email'];
      $data['title'] = !isset($data['title']) ? "" : $data['title'];
      $data['content'] = !isset($data['content']) ? "" : $data['content'];
    }
  ?>
    <div id="header">
        <p id="logo">Simple StackExchange</p>
    </div>

    <div id="form">
      <div id="content" style="width:80%;margin:auto">
              <p id="content-title">What's your question?</p>
              <hr style="width:90%">
              <!--javascript Form Validation -->
              <form name="q_form" id="question" onsubmit="return validateQuestionForm(this)" method="post"  > 
                 <input type="text" name="name" placeholder="Name" value="<?php echo $data['name']; ?>">
                 <input type="text" name="email" placeholder="Email" value="<?php echo $data['email']; ?>">
                 <input type="text" name="topic" placeholder="Question Topic" value="<?php echo $data['topic']; ?>">
                 <textarea name="content" placeholder="Content" rows="5" cols="40"><?php echo $data['content'] ;?></textarea>
                 <input id="submit" type="submit" name="submit" value="Post">
                <input type="hidden" name="question_id" value="<?php echo $q_id ?>" /> 
              </form>
      </div>
    </div>




</body>
</html>
