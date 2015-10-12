<!DOCTYPE html>
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Poiret+One|Roboto' rel='stylesheet' type='text/css'>
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
				<?= $content ?>
			</div>
			<div class="footer"></div>
		</div>
	</body>
</html>
