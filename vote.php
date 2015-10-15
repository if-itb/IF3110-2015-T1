<!--@author : Ignatius Alriana H.M / 13513051-->
<?php 
	include 'dbact.php';

	if (!(isset($_POST['id_q'])&&isset($_POST['action']))) {
		echo '<h2>Error</h2>';
		exit();
	} 

	if(isset($_POST['id_a'])){
		updateVoteA($_POST['id_q'], $_POST['id_a'], $_POST['action']);
		echo displayVoteA($_POST['id_a']);
	} else {
		updateVoteQ($_POST['id_q'],$_POST['action']);
		echo displayVoteQ($_POST['id_q']);
	}
?>
