<?php 
	include ('../controller.php');
?>

<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
?>

<?php
		$arr = array();
		$arr['name'] = $_POST['name'];
		$arr['email'] = $_POST['email'];
		$arr['topic'] = $_POST['topic'];
		$arr['content'] = $_POST['content'];

		insertQuestion($arr);
?>

<?php
	} else {
?>

	<form action="" method="post">
		Name:<br>
		<input type="text" id="name" name="name">
		<br>
		Email:<br>
		<input type="text" id="email" name="email">
		<br>
		Topic:<br>
		<input type="text" id="topic" name="topic">
		<br>
		Content:<br>
		<textarea id="content" name="content"></textarea>
		<button type="submit">Add</button>
	</form>

<?php
	}
?>
