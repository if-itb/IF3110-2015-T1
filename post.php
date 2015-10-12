
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="ikon.ico">
    <title>Ask Question</title>
    <link rel="stylesheet" type="text/css" href='resources/css/style.css'/>
    <link rel="stylesheet" type="text/css" href='resources/css/button.css'/>
 </head>
<body> 
  <div class="atas">
	<a href="index.php"><div class="brands" ><br><br><img src="logo.png"></div></a><br><br>
  </div>
  <h1 class="header">What's your question</h1>
  <div class="bawah">
  <br><br>
  <?php    
        include "connect.php";  
        $name = $email = $topic =$content = "";
       
  ?>
	<form name="QForm" method="post" onsubmit="return validateQForm()" action="ask.php">
      <input name="name" class="span4" type="text" placeholder="name" value="<?php echo $name;?>">
      <span id="nameErr" class="error">*</span>
      <br>
      <input name="email" class="span4" type="text" placeholder="email" value="<?php echo $email;?>">
      <span id="emailErr" class="error">*</span>
      <br>
      <input name="topic"class="span4" type="text" placeholder="topic"  value="<?php echo $topic;?>">
      <span id="topicErr" class="error">*</span>
      <br>
      <textarea name="content" class="span41" placeholder="content" style="padding:11px 4px;" ><?php echo $content;?></textarea>                  
      <span id="contentErr" class="error">*</span>
      <br>
      <input class="tombol2" type="submit" value="post">  </input>
       <script src="resources/js/validate.js" type="text/javascript"></script>

  </form>
  <br><br>
  </div>
  
</body>
</html>
