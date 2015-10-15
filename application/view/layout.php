<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple StackExchange</title>
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
</head>
<body>
	<div class="container">
		<div class="align-center" id="title">
			<h1><a href="index.php">Simple StackExchange</a></h1>	
		</div>

	<?php require_once(ROOT . DS . 'library' . DS . 'routes.php'); ?>	
		
	</div><!-- /container -->

	<script src="<?php echo URL; ?>public/js/script.js"></script>
</body>
</html>