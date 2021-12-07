<?php
session_start();

define("ROOT", $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . "/");
define("DOCROOT", realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "sqlite.php");
require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "template.php");
require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "funcs.php");
require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "peoples.php");

function getURL() {
	$uri = explode("/", $_SERVER["REQUEST_URI"]);
	foreach ($uri as $key => $val) {
			$res[$key] = $val;
	}
	return $res;
}

$man = new peoples();
$url = getURL();
switch ($url[1]) {
	// case "test":
	// 	test_add_man();
	// 	break;
	case "people":
		$content = new template("people.tpl");
		switch ($url[2]) {
			case "add":
				// add new man
				if($_POST["addpeople"]) {
					// add_people($_POST);
					$man->add_man($_POST);
					// header("Location: " . $_SERVER["REQUEST_URI"]);
					// exit;
				}
				$content->options_sex=get_options("sex", "sex");
				$content->options_departments=get_options("departments", "department");
				$content->options_positions=get_options("positions", "position");
				$content->name_addpeople="addpeople";
				$content->val_addpeople="Добавить нового сотрудника";
				break;
			case "edit":
				// edit selected man
				$tmp=get_table_row("peoples","where peopleid=" . $url[3]);
				$content->val_lname=$tmp["lname"];
				$content->val_fname=$tmp["fname"];
				$content->val_mname=$tmp["mname"];
				$content->val_bday=$tmp["birthday"];
				$content->val_tabn=$tmp["tab_N"];
				$content->options_sex=get_options("sex", "sex", $tmp["sexid"]);
				$content->options_departments=get_options("departments", "department", $tmp["departmentid"]);
				$content->options_positions=get_options("positions", "position", $tmp["positionid"]);
				$content->name_addpeople="updatepeople";
				$content->val_addpeople="Обновить данные сотрудника";
				break;
			default:
				$content = new template("list.tpl");
				$content->list_head="Список сотрудников:";
				($url[2]!="") ? $content->list_item=show_people($url[2]) : "";
				$content->list_body=show_peoples();
				// header("Location: " . $_SERVER["REQUEST_URI"] . "/add/");
				break;
		}
		break;
	case "order":
		$content = new template("order.tpl");
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
				$content = new template("list.tpl");
				$content->list_head="Список приказов:";
				$content->list_body=show_orders();
				// header("Location: " . $_SERVER["REQUEST_URI"] . "/add/");
				break;
		}
		break;
	// case "report":
  //       $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "report.tpl");
	// 	break;
	default:
		$content = new template("content.tpl");
		// $content->cont_head="ООО "Газпром газнадзор"<br>филиал Волгоградское управление";
		$content->cont_head="<h2>Сегодня: " . date("d.m.Y") . "</h2>";
		$content->cont_body="Сотрудников в коммандировке: 15<br>Сотрудников в отпуске: 7<br>Сотрудников на больничном: 2";
		break;
}

// $menu=make_menu($url[1]);
$menu = new template("menu.tpl");
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
