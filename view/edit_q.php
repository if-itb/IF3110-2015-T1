<?php 
	include ('../view/layout/header.php');

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$arr = array();
		$arr['name'] = $_POST['name'];
		$arr['email'] = $_POST['email'];
		$arr['topic'] = $_POST['topic'];
		$arr['content'] = $_POST['content'];

		updateQuestion($arr, $_POST['id']);

		redirectTo("/question/" . $_POST['id']);

	} else {

		if ( isset($_GET['id']) ) {
			$id = $_GET['id'];
			$question = getQuestionbyId($id);
?>

	<div id="form">

		<div class="title"> Ask Question </div>
		<div class="content">
			<form id="ask" action="" method="post" onsubmit="return validateAskForm()">
				<input type="hidden" id="id" name="id" value="<?php echo($_GET['id']); ?>">
				<input type="text" id="name" name="name" placeholder="Name" value="<?php echo $question['name']; ?>">
				<br>
				<input type="text" id="email" name="email" placeholder="Email@Email.com" value="<?php echo $question['email']; ?>">
				<br>
				<input type="text" id="topic" name="topic" placeholder="Topic" value="<?php echo $question['topic']; ?>">
				<br>
				<textarea id="content" name="content" placeholder="Content" rows="5" cols="40"><?php echo $question['content']; ?></textarea>
				<button type="submit">Edit</button>
			</form>
		</div>
		
	</div>

<?php
		}
	}

	include ('../view/layout/footer.php');
?>
