<script type="text/javascript" src="delete.js"></script>
<?php

function listQuestion($key){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stackexchange";
	
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if($key== "empty"){
		$sql = "SELECT ID_Question, Topic, Content, Vote, Author, Date FROM question ORDER BY Date DESC";
	}else{
		$sql = "SELECT ID_Question, Topic, Content, Vote, Author, Date FROM question WHERE Topic LIKE '%".$key."%' OR Content LIKE '%".$key."%' ORDER BY Date DESC";
	}

	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
			// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo '<div class= "asked-question">';
				echo '<div class= "kotak">';
					echo "" . $row["Vote"]."<br>";
					echo "Vote" ;
				echo "</div>";
				echo '<div class= "kotak">';
				$sqlans = "SELECT count(*) AS SUM  FROM  answer WHERE ID_Question = '$row[ID_Question]' ";
				$resultans = mysqli_query($conn, $sqlans);	
					$rowans = mysqli_fetch_array($resultans);
					echo "" . $rowans["SUM"]."<br>";
					echo "Answer<br>";
					
				echo "</div>";
				echo '<div class= "question">';
					echo '<a href="Answer.php? id=' . $row["ID_Question"] . '" id=link-question>' . $row["Topic"]."<br>";
					if(strlen($row["Content"] )>100){
						$text = substr($row["Content"], 0, 70) . "...";
					}		
					else{
						$text = $row["Content"];
					}
					echo   $text . "</a>";
				echo "</div>";			
				echo '<div class= "modif-question">';
					echo "asked by $row[Author] | <a href='AskHere.php?id=$row[ID_Question]' id='y'> edit </a> | <a id='r' href='javascript:deletePost(\"delete_question.php?id=$row[ID_Question]\")'>delete</a>";
				echo "</div>";	
			echo "</div>";

		}
	}
	else{
		
	}
	
}
?>