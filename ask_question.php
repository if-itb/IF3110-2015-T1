 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Ask Question | Simple StackExchange</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="script.js"></script>
</head>
<body>
    <header>
    	<a href="index.php"><p>Simple StackExchange</p></a>
    </header>
    <div class="container" id="page_form">
    	<p id="title">What's your question?</p>

    	<div class="ask_question">
    		<form name = "question_form" method="POST" id="form" onsubmit="return validate_question_form()">
    			<input type="text" name="name" placeholder ="   Name "id="nama" />
    			<input type="text" name="email" placeholder="   Email" id="email" />
    			<input type="text" name="question_topic" placeholder="   Question Topic" id="question_topic"/>
    			<textarea name="content" placeholder="   Content" id="content"></textarea> 
    			<input type="submit" name="post" id="post" value="Post">
    		</form>

    		<?php
    			if (isset($_POST['post'])) {
    				$name = $_POST['name'];
    				$email = $_POST['email'];
    				$question_topic = $_POST['question_topic'];
    				$content = $_POST['content'];

    				$dbname = "stackexchange";
                    $host = "localhost";
                    $username = "root";
                    $password = "810f810m";

                    $conn = mysqli_connect($host, $username, $password, $dbname);
    				
    				if (! $conn) {
    					die('Gagal koneksi: '.mysql_error());
    				}

					mysql_select_db('stackexchange');
    				$sql = 

    					   "INSERT INTO question (name, email, question_topic, content) VALUES ('$name', '$email','$question_topic','$content')";

    				
    				$insertdata = mysqli_query($conn, $sql);
    				if (! $insertdata)
    				{
    					die('Gagal tambah data: '. mysql_error());
    				}

                    $last_id = mysqli_insert_id($conn);
                    header("Location: show_question.php?id=".$last_id);
                    exit;

    			}

    		?>

    	</div>
    </div>
</body>
</html>
