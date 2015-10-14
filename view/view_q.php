<?php 
	include ('../view/layout/header.php');

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$arr = array();
		$arr['name'] = $_POST['name'];
		$arr['email'] = $_POST['email'];
		$arr['content'] = $_POST['content'];
		$arr['id_q'] = $_POST['id'];

		insertAnswer($arr);

		redirectTo("/question/" . $arr['id_q']);

	} else {

		if ( isset($_GET['id']) ) {
			$id = $_GET['id'];

			makeQuestionView($id);
			makeFullAList($id);
?>

	<div id="form">

		<div class="title"> Your Answer </div>
		<div class="content">
			<form id="answer" action="" method="post" onsubmit="return validateAnswerForm()">
				<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
				<input type="text" id="name" name="name" placeholder="Name">
				<br>
				<input type="text" id="email" name="email" placeholder="Email@Email.com">
				<br>
				<textarea id="content" name="content" placeholder="Content" rows="5" cols="40"></textarea>
				<button type="submit">Answer</button>
			</form>
		</div>
		
	</div>

<?php
		}
	}

	include ('../view/layout/footer.php');
?>



