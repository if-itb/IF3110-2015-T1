<!DOCTYPE html>
<html lang="en">

<head>
    <title>Simple StackExchange</title>

    <link href="css/style.css" rel="stylesheet">

    <script>
	function validateForm() {
    	var a_name = document.forms["a_form"]["a_name"].value;
    	var a_email = document.forms["a_form"]["a_email"].value;
    	var a_content = document.getElementById("a_content").value;
    	if (a_name == null || a_name == "" || a_email == null || a_email == "" || a_content == null || a_content == "") {
        	alert("All fields must be filled out");
        	return false;
    	} else if (!validateEmail(a_email)) {
    		alert("Email address not valid");
    		return false;
    	}
	}
	function validateEmail(email) {
		var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
		return re.test(email);
	}
    function vote(id, change, db) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            if (db=="questions") { //question
                document.getElementById("qvotes-"+id).innerHTML = xhttp.responseText;
            } else { //answer
                document.getElementById("avotes-"+id).innerHTML = xhttp.responseText;
            }
        }
    }
    xhttp.open("GET", "vote.php?id="+id+"&vote="+change+"&db="+db, true);
    xhttp.send();
    } 
	</script>
</head>
<body id="question">
	<div class="container">
    <a href="index.php"><h1>Simple StackExchange</h1></a>
    <?php
        include 'connect.php';
        $q_id = mysql_real_escape_string($_GET['id']);
        $sql = "SELECT * FROM questions WHERE q_id =" . $q_id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) { 
                echo'<h2>' .$row['q_topic'] .'</h2>';
                echo'<hr>';
                echo'<div class="question-full">';
                echo'    <div class="question-votes">';
                echo'        <div class="upvote" onclick="return vote('.$q_id.',1,\'questions\')"></div>';
                echo'        <div class="vote-number" id="qvotes-'.$q_id.'">' .$row['q_votes'] .'</div>';
                echo'        <div class="downvote" onclick="return vote('.$q_id.',-1,\'questions\')"></div>';
                echo'    </div>';
                echo'    <div class="question-content">';
                echo $row['q_content'];
                echo'    </div>';
                echo'    <div class="details">asked by ' .$row['q_name'] .' at ' .$row['q_date'] . ' | <a href="edit.php?id=' .$q_id . '">edit</a> | <a href="deletequestion.php?id='.$q_id.'" onclick="return confirm(\'Are you sure you want delete this question?\')">delete</a></div>';
                echo'</div>';
                
            }

            //find answers
            $sql = "SELECT * FROM answers where a_qid = " .$q_id;
            $result = $conn->query($sql);

            $q_answers = $result->num_rows;
            echo'<h2>' .$q_answers .' Answers</h2>';
            echo'<hr>';
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo'<div class="question-full">';
                    echo'    <div class="question-votes">';
                    echo'        <div class="upvote" onclick="return vote('.$row['a_id'].',1,\'answers\')"></div>';
                    echo'        <div class="vote-number" id="avotes-'.$row['a_id'].'">' .$row['a_votes'] .'</div>';
                    echo'        <div class="downvote" onclick="return vote('.$row['a_id'].',-1,\'answers\')"></div>';
                    echo'    </div>';
                    echo'    <div class="question-content">';
                    echo $row['a_content'];
                    echo'    </div>';
                    echo'    <div class="details">answered by ' .$row['a_name'] .' at ' .$row['a_date'] .'</div>';
                    echo'</div>';
                    echo'<hr>';
                }

                //q_answers = no. of rows found
                $sql = "UPDATE questions SET q_answers = " .$q_answers . " where q_id = " .$q_id;
                $result = $conn->query($sql);
            }

        } else {
            echo "This page does not exist.";
        }
        ?>

        <form action="submitanswer.php" method="post" id="a_form" onsubmit="return validateForm()">
            <input type="hidden" name="a_qid" value="<?= $q_id ?>">
            <input type="text" class="form-control" placeholder="Name" name="a_name"><br>
            <input type="text" class="form-control" placeholder="Email" name="a_email"><br>
            <textarea id="a_content" name="a_content" placeholder="Content"></textarea><br>
            <button type="submit">Post</button>
        </form>
        </div>
</body>

</html>
