<?php  
	if(isset($_GET['id']))
	{
		include('ConnectDatabase.php');
		$id = $_GET["id"]; 
		$sql = "SELECT * FROM Questions WHERE ID = '$_GET[id]' ORDER BY Date_Created DESC";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$Name	= $row["Name"];
		$Email 	= $row["Email"];
		$Topic	= $row["Topic"];
		$Content= $row["Content"];
	}
	else
	{
		$id= 0; 
		$Name	= "";
		$Email 	= "";
		$Topic	= "";
		$Content= "";
	}
?>