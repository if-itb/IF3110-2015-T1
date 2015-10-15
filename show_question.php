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

                        echo "<tr>";
                            echo "<th colspan='2'><p id='title3'>".$row[1]."</p></th>";
                        echo "</tr>";

                        echo "<tr>";

                        echo "<td class='statistic2'>";
                            echo "<img id='up_button_question' src='images/up.png' onclick='add_question_vote(". $id .")' >";
                            echo "<p id='total_votes2'>".$row[3]."</p>";
                            echo "<img id='down_button_question' src='images/down.png' onclick='substract_question_vote(". $id .")' >";
                        echo "</td>";

                        echo "<td>";
                            echo "<p id='question_content'>".$row[2]."</p>";
                            echo "<p id='username'>asked by <span id='name'>".$row[0].
                                 "</span> | <a id='edit' href=edit_question.php?id=".$id.">edit</a> | ".
                                 '<a id= "delete" href=delete_question.php?id='.$id.' onclick="return confirmDelete()">delete</a>'.
                                 "</p>";
                        echo "</td>";

                        echo "</tr>"; 

                        echo "<tr>";
                            echo "<th colspan='2'></th>";
                        echo "</tr>";

                if ($answer > 0) {    
                    $query2 =  "SELECT email, content, vote, date, answerID FROM answer WHERE questionID = '$id'";
                    $result = mysqli_query($conn, $query2);
                    
                    
                    if (! $result) {
                        die('Gagal ambil data: '.mysql_error());
                    }

                        echo "<tr>";
                            echo "<th colspan='2'><p id='title3'>".$answer." Answer"."</p></th>";
                        echo "</tr>";

                    while($row = mysqli_fetch_row($result)) {
                        

                        echo "<tr>";

                        echo "<td class='statistic2'>";
                            echo "<img id='up_button_answer' src='images/up.png' onclick='add_answer_vote(". $row[4] .") >";
                            echo "<p id='total_votes3".$row[4]."'>".$row[2]."</p>";
                            echo "<img id='down_button_answer' src='images/down.png' onclick='substract_answer_vote(". $row[4] .")' >";
                        echo "</td>";

                        echo "<td>";
                            echo "<p id='question_content'>".$row[1]."</p>";
                            echo "<p id='username'>answered by <span id='name'>".$row[0]."</span>"." at ".$row[3]."</p>";
                        echo "</td>";

                        echo "</tr>"; 

                        echo "<tr>";
                            echo "<th colspan='2'></th>";
                        echo "</tr>";
                    }
                }
                           
                    ?>
        </table>
        

    	<div class="answer_question">
            <p id="title">Your Answer</p>
    		  <form name= "answer_form" id="form" method="POST" onsubmit="return validate_answer_form()">
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
