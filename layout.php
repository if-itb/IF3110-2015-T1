<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Simple Stack Exchange</title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	
	<body>
		<div id="main-wrapper">
			<header>
				<div class="logo">
					<a href="/index.html" class="logo-link">Simple StackExchange</a>
				</div>
			</header>

			<main>
				<?php
					switch($page) {
						case 'home':
							require_once('view_lisquestions.php');
						break;
						case 'question':
							require_once('view_question.php');
						break;
						case 'askform':
							require_once('view_askform.php');
						break;
					}
				?>
			</main>

			<footer>
				<div class="attribution">
					Created by <a>mfikria</a>
				</div>
			</footer>
		</div>
	</body>
</html>