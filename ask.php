<?php
	require_once("./includes/mysql.php");

	include("./includes/header.php");
?>

<?php
	$question_id = isset($_GET['question_id']) ? $_GET['question_id'] : '';

	$data = $question_id != '' ? getQuestion($question_id) : array();
	$data['name'] = !isset($data['name']) ? '' : $data['name'];
	$data['email'] = !isset($data['email']) ? '' : $data['email'];
	$data['title'] = !isset($data['title']) ? '' : $data['title'];
	$data['content'] = !isset($data['content']) ? '' : $data['content'];
?>

<h2 class="underline">What's your question?</h2>

<form action="index.php" method="POST" class="block">
	<input type="text" placeholder="Name" name="name" value="<?php echo $data['name'] ?>" />
	<input type="text" placeholder="Email" name="email" value="<?php echo $data['email'] ?>" />
	<input type="text" placeholder="Question Topic" name="title" value="<?php echo $data['title'] ?>" />
	<textarea name="content" placeholder="Content"><?php echo $data['content'] ?></textarea>
	<input type="submit" value="Post" />
	<input type="hidden" name="type" value="ask" />
	<input type="hidden" name="question_id" value="<?php echo $question_id ?>" />
</form>

<?php
	include("./includes/footer.php");
?>
