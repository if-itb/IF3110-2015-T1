<?php
// Nama			: Ryan Yonata
// NIM			: 13513074
// Nama file 	: delete.php
// Keterangan	: Berisi kode php untuk menghapus pertanyaan dari database

	function RedirectToHome($url, $permanent = false)
	{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
	}
	include('ConnectDatabase.php');
	$Quest_ID = htmlspecialchars($_GET["id"]);
	
	$sql_delete_from_answer = "DELETE FROM Answers WHERE Question_ID = '$Quest_ID'";
	$result_delete_from_answer = mysqli_query($conn, $sql_delete_from_answer);
	$sql_delete_from_question = "DELETE FROM Questions WHERE ID = '$Quest_ID'";
	$result_delete_from_question = mysqli_query($conn, $sql_delete_from_question);
	RedirectToHome('home.php', false);
	$conn->close();
?>