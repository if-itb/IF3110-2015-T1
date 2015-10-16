<!DOCTYPE html>

<?php 
include('A_config.php');

$id = $_GET['post_id'];

$query = mysql_query("delete from post where post_id='$id'") or die(mysql_error());

$query = mysql_query("delete from comment where post_id='$id'") or die(mysql_error());

if ($query) {
	header('location:A_index.php');
}
?>
