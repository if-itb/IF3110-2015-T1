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
		VALUES('$nama','$email','$topic','$content');";
		
		if(mysqli_query($conn,$sql)){
			echo "New Record created successfully";
			return mysqli_insert_id($conn); 
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
		$sql = "DELETE FROM Questions WHERE qid=$qid;";

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

		$sql = "UPDATE Questions SET qName='$nama', qEmail='$email', qTopic='$topic', qContent='$content'  WHERE qid=$qid";

		if (mysqli_query($conn, $sql)) {
			echo "Record updated successfully";
			return $qid;
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			return 0;
		}

		mysqli_close($conn);
	}
	
	function voteUpQuestion($qid,$up){
		global $servername, $username,$password,$dbname;
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		if($up==1){
			$plus = 1;
		}else {
			$plus =-1;
		}
		$sql = "UPDATE Questions SET qVote=(qVote+$plus)  WHERE qid=$qid";

		if (mysqli_query($conn, $sql)) {
			return 1;
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			return 0;
		}

		mysqli_close($conn);
	}
	
	function getAllQuestionOrderByDate(){
		global $servername, $username,$password,$dbname;
		//Create connection
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		//Check Connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM Questions order by qDate DESC;";
		$result = mysqli_query($conn,$sql);
		return $result;
		mysqli_close($conn);
	}
	
	function searchQuestion($string){
		global $servername, $username,$password,$dbname;
		//Create connection
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		//Check Connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM Questions where qContent LIKE '%$string%' OR qTopic LIKE '%$string%';";
		$result = mysqli_query($conn,$sql);
		return $result;
		mysqli_close($conn);
	}
	function getQuestion($qid){
		global $servername, $username,$password,$dbname;
		//Create connection
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		//Check Connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM Questions WHERE qid=$qid;";
		$result = mysqli_query($conn,$sql);
		return $result;
		mysqli_close($conn);
	}
	function getQVote($qid){
		global $servername, $username,$password,$dbname;
		//Create connection
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		//Check Connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT qVote FROM Questions WHERE qid=$qid;";
		$result = mysqli_query($conn,$sql);
		return $result;
		mysqli_close($conn);
	}
?>