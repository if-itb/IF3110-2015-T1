<?php
	$conn = mysqli_connect("localhost", "root", "", "question_answer");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$ID = $_GET['id'];
	$Up = $_GET['U'];
	$Q = $_GET['Q'];
	if($Q == 'true'){
		$sql = "SELECT Q_id, Q_Vote FROM question WHERE Q_id= $ID";
		$question = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($question)) {
			if($Up == 'true'){
				$new = $row["Q_Vote"] + 1;
			}else{
				$new = $row["Q_Vote"] - 1;
			}
		}
		$sql2 = "UPDATE question SET Q_Vote = '$new' WHERE Q_id = '$ID'";
		$result = mysqli_query($conn, $sql2);
	}else{
		$sql3 = "SELECT A_id, A_Vote FROM answer WHERE A_id= $ID";
		$answer = mysqli_query($conn, $sql3);
		while($row = mysqli_fetch_assoc($answer)) {
			if($Up == 'true'){
				$new = $row["A_Vote"] + 1;
			}else{
				$new = $row["A_Vote"] - 1;
			}
		}
		$sql4 = "UPDATE answer SET A_Vote = '$new' WHERE A_id = '$ID'";
		$result = mysqli_query($conn, $sql4);
	} 
	echo "".$new;
	
	
	mysqli_close($conn);
?>