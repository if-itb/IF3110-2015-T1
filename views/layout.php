<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Simple Stack Exchange</title>
		<link rel="stylesheet" href="assets/css/style.css"/>
	</head>
	
	<body>
		<div id="main-wrapper">
			<header>
				<div class="main-header">
					<a href="<?php $_SERVER['HTTP_HOST'] ?>" class="main-header-link">Simple StackExchange</a>
				</div>
			</header>

			<main>
				<?php
					require_once('router.php');
				?>
			</main>
		</div>
	</body>
</html>