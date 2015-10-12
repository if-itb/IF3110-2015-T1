<?php
	include("../Database.php");
	
	deleteQuestion($_POST["qID"]);
	
	echo "This question has been deleted successfully";
	
?>