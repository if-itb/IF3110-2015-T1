<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Simple Stack Exchange : Ask Me</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
    <?php require_once('dbconnect.php'); ?>
</head>

<body>
	<div id="wrapper">
    
        <div id="header">
        
            <div id="title">
                <a href="index.php" class="center"><p>Simple StackExchange</p></a>
            </div>
            
        </div>
        <div class="contents">
        	<h1><p>What's your question?</p></h1>
            <hr>
            <div class="formArea">
                <form name="qForm" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="return validateQForm()" method="post" id="questions_form">
                    <div><input class="formBar" type="text" name="name" placeholder="    Name"></div>
                    <div><input class="formBar" type="text" name="email" placeholder="    E-mail"></div>
                    <div><input class="formBar" type="text" name="qtopic" placeholder="    Question Topic"></div>
                    <div><textarea class="formBar" name="content" form="questions_form" rows="8" placeholder="    Content"></textarea></div>
                    <input id="postQuestion" type="submit" value="POST">
                </form>
            
            
            </div>
        </div>
    </div>
    
    <script src="js/thescript.js"></script>
    <?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// collect value of input field
		$name = $_POST['name'];
		$email = $_POST['email'];
		$qtopic = $_POST['qtopic'];
		$content = $_POST['content'];
		$sql = "INSERT INTO question(name,email,qtopic,content) VALUES ('$name','$email','$qtopic','$content')";
		$conn->query($sql);
		$conn->close();
	}
	?>
</body>
</html>
