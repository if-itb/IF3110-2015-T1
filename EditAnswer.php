<?php
	function Home($url, $permanent = false)
	{
		header('Location: ' . $url, true, $permanent ? 301:302); 
		exit(); 
	}

	if(isset($_POST['answer'])) { 
		date_default_timezone_set("Asia/Bangkok");
		$Name    	= ($_POST["name"]); 
		$Email	  	= ($_POST["email"]); 
		$Content	= ($_POST["content"]); 
		//$ID 		= ($_GET["id"]); 
		$Today		= date("Y-m-d"); 

		$sql = "INSERT INTO answers (Name, Email, Content, Quest_ID, Date_Create) VALUES ('$Name', '$Email', '$Content', '$ID', now())"; 

		$result = mysqli_query($conn,$sql); 
		if (!($result)) {
			die("Invalid query: ".mysql_error()); 
		}
		else { 
			header("Location: answer.php?id=$ID");
		}
	}
?>