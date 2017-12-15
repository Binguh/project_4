<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?= $title ?></title>
		<link rel="stylesheet" type="text/css" href="public/css/style.css">
		<link rel="stylesheet" type="text/css" href="public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=buba5lccnkl3vcm66nbmuhuq999g1ej2lh6tgg8hm8a66lvy"></script>
  		<script>tinymce.init({ selector:'.admin_textarea' });</script>
	</head>

	<header>
		<?= $headerContent ?>
	</header>

	<body>
		<?= $content ?>
	</body>

	<footer>
		<?php include'frontend/footer.php'; ?>
	</footer>
</html>