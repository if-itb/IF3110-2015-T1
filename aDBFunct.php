<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "wbd";
	
	function getAllAnswerOrderByVote($qid){
		global $servername, $username,$password,$dbname;
		//Create connection
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		//Check Connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM Answers where qid=$qid order by aVote DESC;";
		$result = mysqli_query($conn,$sql);
		return $result;
		mysqli_close($conn);
	}
	function submitAnswer($qid,$nama,$email,$content){
		global $servername, $username,$password,$dbname;
		//Create conncetion
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		//Check Conncetion
		if (!$conn){
			die("Connection failed: " . mysqli_connect_error());
			return 0;
		}
		$sql = "INSERT INTO Answers (qid,aName,aEmail,aContent) VALUES('$qid','$nama','$email','$content');";
		
		if(mysqli_query($conn,$sql)){
			echo "New Record created successfully";
			return mysqli_insert_id($conn); 
		} else {
			echo "Error: ", $sql."<br>" . mysqli_error($conn);
			return 0;
		}	
	}
	function countAnswer($qid){
		global $servername, $username,$password,$dbname;
		//Create connection
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		//Check Connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT Count(*) as count FROM Answers where qid=$qid";
		$result = mysqli_query($conn,$sql);
		return $result;
		mysqli_close($conn);
	}
	function voteUpAnswer($aid,$up){
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
		$sql = "UPDATE Answers SET aVote=(aVote+$plus)  WHERE aid=$aid";

		if (mysqli_query($conn, $sql)) {
			return 1;
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			return 0;
		}

		mysqli_close($conn);
	}
	function getAVote($aid){
		global $servername, $username,$password,$dbname;
		//Create connection
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		//Check Connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT aVote FROM Answers WHERE aid=$aid;";
		$result = mysqli_query($conn,$sql);
		return $result;
		mysqli_close($conn);
	}
?>
