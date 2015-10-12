<?php
    function Redirect($url, $permanent = false){
	    header('Location: ' . $url, true, $permanent ? 301 : 302);
	    exit();
    }

    if (isset($_GET['id'])){
		DEFINE('DB_HOST','localhost');
		DEFINE('DB_USER','root');
		DEFINE('DB_PASSWORD','alberttriadrian');
		DEFINE('DB_NAME','simplestackexchange');

		// Create connection
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		mysqli_set_charset($dbc,'utf8');

		// Check connection
		if (!$conn){
		    die("Connection failed: " . mysqli_connect_error());
		} 

		$id = $_GET['id'];

		$sql = "DELETE FROM answers WHERE q_id=$id";

		if (mysqli_query($conn, $sql)) {
		    echo "All answers deleted successfully";
		} 
		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$sql = "DELETE FROM questions WHERE q_id=$id";

		if (mysqli_query($conn, $sql)) {
		    echo "Question deleted successfully";
		} 
		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		mysqli_close($conn);    	
    }

	//   	Redirect("index.php", false);

?>
