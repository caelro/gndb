<?php
define("ROOT", ($_SERVER["REQUEST_SCHEME"] ?? 'http') . "://" . $_SERVER["HTTP_HOST"] . "/");
define("DOCROOT", realpath(__DIR__));

set_include_path(DOCROOT . '/src');
spl_autoload_extensions('.php');
spl_autoload_register();
require 'functions.php';

function getURL() {
	$uri = explode("/", $_SERVER["REQUEST_URI"]);
	foreach ($uri as $key => $val) {
			$res[$key] = $val;
	}
	return $res;
}

$man = new peoples();
$order = new orders();
$url = getURL();
$url[2] ??= '';
switch ($url[1]) {
	// case "test":
	// 	test_add_man();
	// 	break;
	case "people":
		$content = new template("people");
		switch ($url[2]) {
			case "add":
				// add new man
				if($_POST) {
					// add_people($_POST);
					$man->add_man($_POST);
					header("Location: " . ROOT . "people");
					// exit;
				}
				$content->options_sex=get_options("sex", "sex");
				$content->options_departments=get_options("departments", "department");
				$content->options_positions=get_options("positions", "position");
				$content->name_addpeople="addpeople";
				$content->val_addpeople="Добавить нового сотрудника";
				break;
			case "edit":
				if($_POST) {
					// add_people($_POST);
					$man->update_man($_POST);
					header("Location: " . ROOT . "people");
					exit;
				}
				// edit selected man
				$tmp=$man->get_man_by_id($url[3]);
				$content->val_id=$tmp["id"];
				$content->val_lname=$tmp["lname"];
				$content->val_fname=$tmp["fname"];
				$content->val_mname=$tmp["mname"];
				$content->val_bday=$tmp["birthday"];
				$content->val_tabn=$tmp["tab_N"];
				$content->val_odate=$tmp["orderdate"];
				$content->options_sex=get_options("sex", "sex", $tmp["sexid"]);
				$content->options_departments=get_options("departments", "department", $tmp["departmentid"]);
				$content->options_positions=get_options("positions", "position", $tmp["positionid"]);
				$content->name_addpeople="updatepeople";
				$content->val_addpeople="Обновить данные сотрудника";
				break;
			case "del":
				$man->del_man($url[3]);
				header("Location: " . ROOT . "people");
				break;
			default:
				$content = new template("list");
				$content->list_head="Список сотрудников:";
				($url[2]!="") ? $content->list_item=$man->show_people($url[2]) : "";
				$content->list_body=$man->show_peoples();
				// header("Location: " . $_SERVER["REQUEST_URI"] . "/add/");
				break;
		}
		break;
	case "order":
		$content = new template("order");
		switch ($url[2]) {
			case "add":
				$content->options_departments=get_options("departments", "department");
				// $content->options_positions=get_options("positions", "position");
				$content->options_peoples=get_options("all_peoples", "fullname", 0, array("otdel"=>"departmentid"));
				$content->options_types=get_options("all_types", "type");
        // $content->set_tpl("{OPTIONS_OBJ}", get_optons("objects", array("object", "object")));
        // $content->set_tpl("{OPTIONS_VIEW}", get_optons("views", "view"));
        // $content->set_tpl("{OPTIONS_AUTO}", get_optons("all_autos", array("auto", "auto")));
				break;
			case "edit":
				break;

			default:
				$content = new template("list");
				$content->list_head="Список приказов:";
				$content->list_body=$order->show_orders();
				// header("Location: " . $_SERVER["REQUEST_URI"] . "/add/");
				break;
		}
		break;
	default:
		$content = new template("content");
		// $content->cont_head="ООО "Газпром газнадзор"<br>филиал Волгоградское управление";
		$content->cont_head="<h2>Сегодня: " . date("d.m.Y") . "</h2>";
		$content->cont_body="Сотрудников в коммандировке: 15<br>Сотрудников в отпуске: 7<br>Сотрудников на больничном: 2";
		break;
}

// $menu=make_menu($url[1]);
$menu = new template("menu");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	<title>ООО "Газпром газнадзор" Волгоградский филиал</title>
	<!-- <link rel="stylesheet" href="../css/bootstrap.css"/> -->
	<!-- <link rel="stylesheet" href="../css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="<?=ROOT;?>css/style.css"/>
	<script src="<?=ROOT;?>js/jquery-3.4.1.min.js"></script>
</head>
<body>
	<div class="layout">
				<div class="sidebar">
					<?= $menu; ?>
				</div>
				<div class="content">
					<?= $content; ?>
				</div>
	</div>
	<!-- <script src="../js/bootstrap.min.js"></script> -->
</body>
</html>
