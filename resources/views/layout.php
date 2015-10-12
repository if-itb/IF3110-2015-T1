<!DOCTYPE html>
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Tangerine|Roboto' rel='stylesheet' type='text/css'>
		<?= $metas ?>
		<?= $styles ?>
		<?= $scripts ?>
		<title><?= $title ?></title>
	</head>
	<body>
		<div align='center'>
			<div class="header">
				<h1 id="title">Asklyz</h1>
			</div>
			<?= $search ?>
			<div class="content">
				<h2 class="card"><?= $headline; ?></h2>
				<?= $content ?>
			</div>
			<div class="footer"></div>
		</div>
	</body>
</html>
