<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	<title><?=$title;?></title>
	<!-- <link rel="stylesheet" href="../css/bootstrap.css"/> -->
	<!-- <link rel="stylesheet" href="../css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="<?=$root;?>css/style.css"/>
	<script src="<?=$root;?>js/jquery-3.4.1.min.js"></script>
</head>
<body>
	<div class="container">
				<div class="menu">
					<?= $menu; ?>
				</div>
				<div class="content">
					<?= $cont; ?>
				</div>
	</div>
	<!-- <script src="../js/bootstrap.min.js"></script> -->
</body>
</html>
