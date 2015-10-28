 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Edit Question | Simple StackExchange</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="script.js"></script>
</head>
<body>
    <header>
    	<a href="index.php"><p>Simple StackExchange</p></a>
    </header>
    <div class="container" id="page_form">
    	<p id="title">What's your question?</p>

                <?php

                    $dbname = "stackexchange";
                    $host = "localhost";
                    $username = "root";
                    $password = "810f810m";

                    $conn = mysqli_connect($host, $username, $password, $dbname);
                    
                    if (! $conn) {
                        die('Gagal koneksi: '.mysql_error());
                    }

                    mysql_select_db('stackexchange');

                    $id = isset($_GET['id']) ? $_GET['id'] : '';

                    $query = "SELECT questionID, name, email, question_topic, content FROM question WHERE questionID = '$id'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_row($result);

                ?>

    	   <div class="ask_question">
                <form name="question_form" id="form" method="POST" onsubmit="return validateQuestionForm()">
                <input type="hidden" name="questionID" value="<?php echo $id; ?>" />
                <input type="text" name="name" value ="<?php echo $row[1]; ?>" id="nama" />
    			<input type="text" name="email" value="<?php echo $row[2]; ?>" id="email" />
    			<input type="text" name="question_topic" value="<?php echo $row[3]; ?>" id="question_topic"/>
    			<textarea name="content" id="content" value=><?php echo $row[4]; ?></textarea>
    			<input type="submit" name="post" id="post" value="Post">
    		</form>;    
    		
            <?php 
    			if (isset($_POST['post'])) {
    				$name = $_POST['name'];
    				$email = $_POST['email'];
    				$question_topic = $_POST['question_topic'];
    				$content = $_POST['content'];

    				
    				$sql = "UPDATE question SET name='$name', email='$email', content='$content' WHERE questionID = '$id'";
    				
    				$insertdata = mysqli_query($conn, $sql);
    				if (! $insertdata)
    				{
    					die('Gagal tambah data: '. mysql_error());
    				}

    			}

    		?>


    	</div>
    </div>
</body>
</html>
