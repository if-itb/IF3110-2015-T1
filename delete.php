<?php
    include 'connect.php';
    $q_id = mysql_real_escape_string($_GET['id']);
	$sql = "DELETE FROM answers WHERE a_qid =" . $q_id;

    if ($conn->query($sql) === TRUE) {
    	$sql = "DELETE FROM questions WHERE q_id =" . $q_id;
	    if ($conn->query($sql) === TRUE) {
	    	$conn->close();
			echo "<script>window.location = 'index.php'</script>";
		} else {
	    	echo "Error: " . $sql . "<br>" . $conn->error;
		}
    } else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>
