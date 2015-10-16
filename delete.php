<?php
	$sql = "DELETE FROM questions WHERE id=".$_GET['id'];
	$sql = "DELETE FROM answer WHERE idquest=".$_GET['id'];
?>