<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Home | Simple StackExchange</title>
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

    	<div class="find_question">
    		<form method="post" action="home.php" id="searching" >
    			<input type="text" name="question" id="question"/>
    			<input type="submit" name="search" id="search" value="Search"/>
    		</form>
    		<p>Cannot find what you are looking for? <a href="ask_question.php" id="ask_here">Ask here</a></p>
    	</div>

    	<div class="recently">
    		<h3 id="title">Recently Asked Questions</h3>

    		<table>
                <?php
                    $query =    "SELECT questionID, email, question_topic, content, vote, answer FROM question";

                    $result = mysqli_query($conn, $query);
                
    
                    if (! $result) {
                        die('Gagal ambil data: '.mysql_error());
                    }
                    
                        
                    while ($row = mysqli_fetch_row($result)) {

                    	echo "<tr>";
                    	echo "<td class='statistic'>";
                    		echo "<p id='total_votes'>".$row[4]."</p>";
                    		echo "<p>Votes</p>";
                    	echo "</td>";

                    	echo "<td class='statistic'>";
                    		echo "<p id='total_answer'>".$row[5]."</p>";
                    		echo "<p>Answers</p>";
                    	echo "</td>";

                    	echo "<td>";
                    		echo '<a href=show_question.php?id='.$row[0].'>'.'<p id="title2">'.$row[2].'</p></a>';
                    		echo "<p id='question_content'>".substr($row[3],0,180);
                            echo "</p>";
                    		echo '<p id="username">asked by <span id="name">'.$row[1].'</span> | ';
                            echo '<a id= "edit" href=edit_question.php?id='.$row[0].'>'."edit".'</a> | '.
                                 '<a id= "delete" href=delete_question.php?id='.$row[0].' onclick="confirm_delete_question()">delete</a>'.
                                 "</p>";
                    	echo "</td>";


                    	echo "</tr>"; 

                        echo "<tr>";
                            echo "<th colspan='3'></th>";
                        echo "</tr>";
                    }

                    mysqli_close($conn);

                ?>
            </table>
    	</div>
    </div>
</body>
</html>
