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
		$arr['topic'] = $_POST['topic'];
		$arr['content'] = $_POST['content'];

		insertQuestion($arr);
?>

<?php
	} else {
?>

	<div id="form">

		<div class="title"> Ask Question </div>
		<div class="content">
			<form id="ask" action="" method="post" onsubmit="return validateAskForm()">
				<input type="text" id="name" name="name" placeholder="Name">
				<br>
				<input type="text" id="email" name="email" placeholder="Email@Email.com">
				<br>
				<input type="text" id="topic" name="topic" placeholder="Topic">
				<br>
				<textarea id="content" name="content" placeholder="Content" rows="5" cols="40"></textarea>
				<button type="submit">Add</button>
			</form>
		</div>
		
	</div>

<?php
	}

	include ('../view/layout/footer.php');
?>
