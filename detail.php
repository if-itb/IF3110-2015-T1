<!DOCTYPE html>
<html>
<head>
	<title>Detail</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="script.js"></script>
   
</head>
<body>
    <div class="board">
        <h1>Simple StackExchange</h1>
         <?php include "detailquestion_replace.php"; ?>
    </div>
    
    <div class="board">
        <strong>1 Answer</strong>
    </div>
    <div class="board">
        <div class="votequestform">
            <div class="vote">
                <div class="vote-up">
                
                </div>
                
                <div class="vote-count">
                    2
                </div>
                
                <div class="vote-down">
                
                </div>
            </div>
            
            <div class="question">
                isi dari jawaban
            </div>
            
            <div class="detaileditor">
            answered by name at date
            </div>
        </div>        
    </div>

    
    <div class="board">
        Your Answer
    <form action="answer_insert.php" onsubmit="return validateForm()" method="post" name="form" >
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


