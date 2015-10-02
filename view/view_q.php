<?php 
	include ('../view/layout/header.php');
?>


<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
?>

<?php
		$arr = array();
		$arr['name'] = $_POST['name'];
		$arr['email'] = $_POST['email'];
		$arr['content'] = $_POST['content'];
		$arr['id_q'] = $_POST['id'];

		insertAnswer($arr);
?>

<?php
	} else {
?>

<?php
	if ( isset($_GET['id']) ) {
		$id = $_GET['id'];

		makeQuestionView($id);
		makeFullAList($id);
	}
?>

	<form action="" method="post">
		<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
		Name:<br>
		<input type="text" id="name" name="name">
		<br>
		Email:<br>
		<input type="text" id="email" name="email">
		<br>
		Content:<br>
		<textarea id="content" name="content"></textarea>
		<button type="submit">Answer</button>
	</form>

<?php
	}
	
	include ('../view/layout/footer.php');
?>



