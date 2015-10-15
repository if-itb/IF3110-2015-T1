<?php
	function createConnection(){
		$servername = "localhost";
		$username = "root";
		$password = "mysql";
		$dbname = 'stackexchange';

		//Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		;
		//Check connection
		if ($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}

		return $conn;
	}

	//Return an array of results from the query
	function getResult($sql){
		$conn = createConnection();
		
		$sqlresult = $conn->query($sql);
		
		$result = array();
		if($sqlresult->num_rows > 0){
			while($row = $sqlresult->fetch_assoc()){
				array_push($result, $row);		
			}
		}

		closeConnection($conn);

		return $result;
	}

	function executeQuery($sql){
		$conn = createConnection();
		$sqlresult = $conn->query($sql);
		closeConnection($conn);
	}

	function closeConnection($conn){
		$conn->close();
	}

?>