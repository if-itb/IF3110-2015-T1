<?php
		include 'dbfunctions.php';
		$conn=ConnectToDatabase();

		if(isset($_POST['search_button'])) {
			$searchkey = $_POST['searchkey']; 
			
			$searchkey = mysqli_real_escape_string($conn,$searchkey);
			

			
			$sql = "SELECT * FROM Question WHERE question_topic='%$searchkey%' OR question_content='%$searchkey%'";

			if (!mysqli_query($conn, $sql)) {
    			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			
			header("Location: question-list.php?search=". $searchkey);
		}	
?>