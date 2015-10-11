<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple StackExchange</title>
	<?php echo "<style>"; ?>
	<?php include ROOT . DS . 'public' . DS . 'css' . DS . 'style.css'; ?>
	<?php echo "</style>"; ?>
</head>
<body>
	<div class="container">
		<div class="align-center" id="title">
			<h1>Simple StackExchange</h1>	
		</div>

	<?php require_once(ROOT . DS . 'library' . DS . 'routes.php'); ?>	
		
	</div><!-- /container -->
</body>
</html>