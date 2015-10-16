 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Question | Simple StackExchange</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="script.js"></script>
</head>
<body>
    <header>
    	<a href="index.php"><p>Simple StackExchange</p></a>
    </header>
    <div class="container">
    	
        <?php
                    $dbname = "stackexchange";
                    $host = "localhost";
                    $username = "root";
                    $password = "810f810m";
                    $conn = mysqli_connect($host, $username, $password, $dbname);

                    mysql_select_db('stackexchange');
        ?>

        <table>
                <?php

                    $id = isset($_GET['id']) ? $_GET['id'] : '';

                    
                    $query =    "SELECT email, question_topic, content, vote, answer,  date FROM question WHERE questionID = '$id'";
                    $result = mysqli_query($conn, $query);

                    
                    
                    if (! $result) {
                        die('Gagal ambil data: '.mysql_error());
                    }
                    $row = mysqli_fetch_row($result);
                    $answer = $row[4];
                    ?>
                        <tr>
                            <th colspan='2'><p id='title3'><?php echo $row[1]; ?></p></th>
                        </tr>

                        <tr>

                        <td class='statistic2'>
                            <img src='images/up.png' onclick='vote_up_question(<?php echo $id; ?> )' id='up_button_question'>
                            <p id='total_votes2'><?php echo $row[3]; ?></p>
                            <img src='images/down.png' onclick='vote_down_question(<?php echo $id; ?> )' id='down_button_question' >
                        </td>

                        <td>
                            <p id='question_content'><?php echo $row[2]; ?></p>
                            <p id='username'>asked by <span id='name'><?php echo $row[0]; ?>
                                </span> at <?php echo $row[5]; ?> | <a id='edit' href="edit_question.php?id=<?php echo $id; ?>" >edit</a> | 
                                <a id= "delete"  onclick='confirm_delete_question()' href="delete_question.php?id=<?php echo $id; ?>">delete</a>
                                </p>
                        </td>

                        </tr> 

                        <tr>
                            <th colspan='2'></th>
                        </tr>

                    <?php

                if ($answer > 0) {    
                    $query2 =  "SELECT email, content, vote, date, answerID FROM answer WHERE questionID = '$id'";
                    $result = mysqli_query($conn, $query2);
                    
                    
                    if (! $result) {
                        die('Gagal ambil data: '.mysql_error());
                    }

                    ?>

                        <tr>
                            <th colspan='2'><p id='title3'><?php echo $answer; ?> Answer</p></th>
                        </tr>

                    <?php

                    while($row = mysqli_fetch_row($result)) {
                        ?>

                        <tr>

                        <td class='statistic2'>
                            <img src='images/up.png' onclick='vote_up_answer(<?php echo $row[4]; ?>)' id='up_button_answer' >
                            <p id='total_votes3<?php echo $row[4]; ?>'><?php echo $row[2]; ?></p>
                            <img src='images/down.png' onclick='vote_down_answer(<?php echo $row[4]; ?>)' id='down_button_answer'>
                        </td>

                        <td>
                            <p id='question_content'><?php echo $row[1]; ?></p>
                            <p id='username'>answered by <span id='name'> <?php echo $row[0]; ?></span> at <?php echo $row[3]; ?></p>
                        </td>

                        </tr> 

                        <tr>
                            <th colspan='2'></th>
                        </tr>

                        <?php
                    }
                }
                           
                    ?>
        </table>
        

    	<div class="answer_question">
            <p id="title">Your Answer</p>
    		  <form name= "answer_form" id="form" method="POST" onsubmit="return validate_answer_form()"/>
    		      <input type="text" name="name" placeholder ="   Name "id="name" />
    		      <input type="text" name="email" placeholder="   Email" id="email" />
    		      <textarea name="content" placeholder="   Content" id="content"></textarea> 
    		      <input type="submit" name="post" id="post" value="Post"/>
    		  </form>

              <?php
              if (isset($_POST['post'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $content = $_POST['content'];

                    $sql = "INSERT INTO answer (name, email, content, questionID) VALUES ('$name', '$email','$content', '$id')";
                    $insertdata = mysqli_query($conn, $sql);
                    if (! $insertdata)
                    {
                        die('Gagal tambah data: '. mysql_error());
                    }
                    $sql = "UPDATE question SET answer=answer+1 WHERE questionID='$id'";
                    $addanswer = mysqli_query($conn, $sql);


                }
              ?>
    	</div>
    </div>
</body>
</html>
