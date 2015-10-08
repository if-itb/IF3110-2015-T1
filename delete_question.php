<?php
function Redirect($url, $permanent = false)
{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
}	
$servername = "localhost";
$username 	= "root";
$password 	= "";
$dbname 	= "stackexchange";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM answer WHERE ID_Question= '$_GET[id]'";

if ($conn->query($sql) === TRUE) {
	$sql = "DELETE FROM question WHERE ID_Question= '$_GET[id]'";
	if ($conn->query($sql) === TRUE) {
		$conn->close();
		Redirect('index.php', false);
	}else {
		echo "Error deleting record: " . $conn->error;
	}
} else {
    echo "Error deleting record: " . $conn->error;
}


?>