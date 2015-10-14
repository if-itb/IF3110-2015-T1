<!DOCTYPE html>
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Tangerine|Roboto' rel='stylesheet' type='text/css'>
		<?php foreach ($metadatas as $metadata): ?>
			<?= $metadata ?>
		<?php endforeach; ?>
		<title><?= $title ?></title>
	</head>
	<body>
		<div>
			<div class="header">
				<h1 id="title">Asklyz</h1>
			</div>
			<?php if (isset($search)): ?>
				<?= $search ?>
			<?php endif; ?>
			<div class="content">
				<div class='card'>
					<h2><?= $headline; ?></h2>
				</div>
				<?= $content ?>
			</div>
			<div class="footer"></div>
		</div>
	</body>
</html>
