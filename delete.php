<?php
    require_once("./database.php");
?>

<?php
	if (isset($_POST['id']) && $_POST['id'] != 0) {
		$q = "DELETE from question WHERE Q_ID= $_POST[id]";
		$rq = mysqli_query($connect,$q);
	}
?>
