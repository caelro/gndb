<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	<title><?= Config::$siteTitle ?></title>
	<!--<link rel="stylesheet" href="/vendor/bootstrap/bootstrap.min.css"/> -->
	<link rel="stylesheet" href="/vendor/fontawesome-free-6.1.0-web/css/all.min.css">
	<link rel="stylesheet" href="/css/styles.css"/>
	<!--<script src="/vendor/jquery/jquery-3.6.1.min.js"></script>-->
	<!--<script src="/vendor/bootstrap/js/bootstrap.min.js"></script> -->
</head>
<body>
<div class="layout">
	<div class="sidebar">
		<?= Template::render('menu') ?>
	</div>
	<div class="content">
		<?= $content ?>
	</div>
</div>
