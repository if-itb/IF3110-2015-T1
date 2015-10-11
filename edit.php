<!DOCTYPE html>
<html lang="en">

<head>
	<title>Simple StackExchange</title>

    <link href="css/style.css" rel="stylesheet">

    <script>
	function validateForm() {
    	var q_name = document.forms["q_form"]["q_name"].value;
    	var q_email = document.forms["q_form"]["q_email"].value;
    	var q_topic = document.forms["q_form"]["q_topic"].value;
    	var q_content = document.getElementById("q_content").value;
    	if (q_name == null || q_name == "" || q_email == null || q_email == "" || q_topic == null || q_topic == "" || q_content == null || q_content == "") {
        	alert("All fields must be filled out");
        	return false;
    	} else if (!validateEmail(q_email)) {
    		alert("Email address not valid");
    		return false;
    	}
	}
	function validateEmail(email) {
		var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
		return re.test(email);
	}
	</script>
</head>
<body id="question">
	<div class="container">
    <h1>Simple StackExchange</h1>
    <h2>What's your question?</h2>
    <hr>
     <?php
        include 'connect.php';
        $q_id = mysql_real_escape_string($_GET['id']);
        $sql = "SELECT q_name, q_email, q_topic, q_content FROM questions WHERE q_id =" . $q_id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo'<form action="editquestion.php" method="post" id="q_form" onsubmit="return validateForm()">';
            echo'    <input type="hidden" name="q_id" value="' . $q_id. '">';
            echo'    <input type="text" class="form-control" placeholder="Name" name="q_name" value="' . $row['q_name'] .'"><br>';
            echo'    <input type="text" class="form-control" placeholder="Email" name="q_email" value="' . $row['q_email'] .'"><br>';
            echo'    <input type="text" class="form-control" placeholder="Question Topic" name="q_topic" value="' . $row['q_topic'] .'"><br>';
            echo'    <textarea id="q_content" name="q_content" placeholder="Content">' . $row['q_content'] .'</textarea><br>';
            echo'    <button type="submit">Post</button>';
            echo'</form>';
            }
        }
    ?>
    </div>
</body>

</html>
