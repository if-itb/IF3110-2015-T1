<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "wbd";
	
	function submitQuestion($nama,$email,$topic,$content){
		global $servername, $username,$password,$dbname;
		//Create conncetion
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		//Check Conncetion
		if (!$conn){
			die("Connection failed: " . mysqli_connect_error());
			return 0;
		}
		$sql = "INSERT INTO Questions (qName,qEmail,qTopic,qContent)
		VALUES('$nama','$email','$topic','$content')";
		
		if(mysqli_query($conn,$sql)){
			echo "New Record created successfully";
			return 1; 
		} else {
			echo "Error: ", $sql."<br>" . mysqli_error($conn);
			return 0;
		}	
	}	
	
	function deleteQuestion($qid){
		global $servername, $username,$password,$dbname;
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// sql to delete a record
		$sql = "DELETE FROM Questions WHERE qid=$qid";

		if (mysqli_query($conn, $sql)) {
			echo "Record deleted successfully";
			return 1;
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
			return 0;
		}
		mysqli_close($conn);
	}
	
	function updateQuestion($qid,$nama,$email,$topic,$content){
		global $servername, $username,$password,$dbname;
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE Questions SET qBame='$name', qEmail='$email', qTopic='$topic',qtopic  WHERE id=2";

		if (mysqli_query($conn, $sql)) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
	}
	
	function getAllQuestion(){
		global $servername, $username,$password,$dbname;
		//Create connection
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		//Check Connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM Questions";
		$result = mysqli_query($conn,$sql);
		return $result;
	}
	function getQuestion($qid){
	}
?>