
<?php
        include "getedit.php";
      ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="ikon.ico">
    <title>Edit  question</title>
    <link rel="stylesheet" type="text/css" href='resources/css/style.css'/>
    <link rel="stylesheet" type="text/css" href='resources/css/button.css'/>
 </head>
<body> 
     <div class="atas">
	 <a href="index.php"><div class="brands" ><br><br><img src="logo.png"></div></a><br><br>
  </div>
  <h1 class="header">Edit your question</h1>
	<div class="bawah">
  <br><br>
  <form name="QForm" method="post" onsubmit="return validateQForm()" action="update.php?id=<?php echo $ids;?>" >
      <input name="name" class="span4" type="text" placeholder="name" value="<?php echo $name;?>">
      <span id="nameErr" class="error">*</span>
      <br>
      <input name="email" class="span4" type="text" placeholder="email" value="<?php echo $email;?>">
      <span id="emailErr" class="error">*</span>
      <br>
      <input name="topic"class="span4" type="text" placeholder="topic"  value="<?php echo $topic;?>">
      <span id="topicErr" class="error">*</span>
      <br>
      <textarea name="content" class="span41" placeholder="content" ><?php echo $content;?></textarea>             
      <span id="contentErr" class="error">*</span>
      <br>
      <button class="tombol2" type="submit"> Edit </button>
      <script src="resources/js/validate.js" type="text/javascript"></script>
    
  </form>
  <br><br>
  </div>
</body>
</html>