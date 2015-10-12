<?php
	echo
	require_once("../config/config.php");

	// Delete question
	function deleteQuestion($id) {
		global $conn;

		$q_id = mysqli_real_escape_string($conn, $id);
		// Delete the question in database
		$sql = "DELETE FROM question WHERE id='$q_id'";

		if (mysqli_query($conn, $sql)) {
			header('location: ../');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	deleteQuestion($_GET["q_id"]);
?>