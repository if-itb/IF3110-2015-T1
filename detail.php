<!DOCTYPE html>
<html>
<head>
	<title>Detail</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="script_answer.js"></script>
   
</head>
<body>
    <div class="board">
        <h1>Simple StackExchange</h1>
         <?php include "detailquestion_replace.php"; ?>
    </div>
    
    <?php include "detailanswer_replace.php" ?>
    
   

    
    <div class="board">
        Your Answer
    <form action="answer_insert.php?no_question=<?php echo $no_question ?>" onsubmit="return validateForm()" method="post" name="form" >
			<br>
			<input type="text" placeholder="Name" name="name" class="box">
			<br>
			<br>
			<input type="text" placeholder="Email" name="email" class="box">
			<br>
			<br>
			<textarea placeholder="Content" name="content" class="box" rows="5" cols="22"></textarea>
			<br>
			<button type="submit" class="posisipost">Post </button>
            
		</form>
        </div>
    
</body>
</html>


