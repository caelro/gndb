<?php
define("ROOT_URL", ($_SERVER["REQUEST_SCHEME"] ?? 'http') . "://" . $_SERVER["HTTP_HOST"] . "/");
define("PROJECT_ROOT", realpath(__DIR__));
const DB_DSN = 'sqlite:' . PROJECT_ROOT . '/data/db.sqlite';

set_include_path(PROJECT_ROOT . '/src');
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

$url = explode('/', $_SERVER['REQUEST_URI']);
$url[2] ??= '';
switch ($url[1]) {
	// case "test":
	// 	test_add_man();
	// 	break;
	case 'employees':
		$content = new Template('employee');
		$man = new Employees();
		switch ($url[2]) {
			case "add":
				// add new man
				if($_POST) {
					$man->add_man($_POST);
					header('Location: /employees');
					// exit;
				}
				$content->options_sex=get_select_options_html("sex", "sex");
				$content->options_departments=get_select_options_html("departments", "department");
				$content->options_positions=get_select_options_html("positions", "position");
				$content->val_submit="Добавить нового сотрудника";
				break;
			case "edit":
				if($_POST) {
					$man->update_man($_POST);
					header('Location: /employees');
					exit;
				}
				// edit selected man
				$tmp=$man->get_by_id($url[3]);
				$content->val_id=$tmp["id"];
				$content->val_lname=$tmp["lname"];
				$content->val_fname=$tmp["fname"];
				$content->val_mname=$tmp["mname"];
				$content->val_bday=$tmp["birthday"];
				$content->val_tabn=$tmp["tab_N"];
				$content->val_odate=$tmp["orderdate"];
				$content->options_sex=get_select_options_html("sex", "sex", $tmp["sexid"]);
				$content->options_departments=get_select_options_html("departments", "department", $tmp["departmentid"]);
				$content->options_positions=get_select_options_html("positions", "position", $tmp["positionid"]);
				$content->val_submit="Обновить данные сотрудника";
				break;
			case "del":
				$man->del_man($url[3]);
				header('Location: /employees');
				break;
			default:
				$content = new Template("list");
				$content->list_head="Список сотрудников:";
				$content->list_body=$man->get_list_html();
				// header("Location: " . $_SERVER["REQUEST_URI"] . "/add/");
				break;
		}
		break;
	case "order":
		$order = new Orders();
		$content = new Template("order");
		switch ($url[2]) {
			case "add":
				$content->options_departments=get_select_options_html("departments", "department");
				// $content->options_positions=get_options("positions", "position");
				$content->options_employees=get_select_options_html("all_employees", "fullname", 0, ['otdel' => 'departmentid']);
				$content->options_types=get_select_options_html("all_types", "type");
        // $content->set_tpl("{OPTIONS_OBJ}", get_optons("objects", array("object", "object")));
        // $content->set_tpl("{OPTIONS_VIEW}", get_optons("views", "view"));
        // $content->set_tpl("{OPTIONS_AUTO}", get_optons("all_autos", array("auto", "auto")));
				break;
			case "edit":
				break;

			default:
				$content = new Template("list");
				$content->list_head="Список приказов:";
				$content->list_body=$order->get_list_html();
				// header("Location: " . $_SERVER["REQUEST_URI"] . "/add/");
				break;
		}
		break;
	default:
		$content = new Template("content");
		// $content->cont_head="ООО "Газпром газнадзор"<br>филиал Волгоградское управление";
		$content->cont_head="<h2>Сегодня: " . date("d.m.Y") . "</h2>";
		$content->cont_body="Сотрудников в коммандировке: 15<br>Сотрудников в отпуске: 7<br>Сотрудников на больничном: 2";
		break;
}
$layout = new Template('main');
$layout->title = 'ООО "Газпром газнадзор" Волгоградский филиал';
$layout->menu = new Template('menu');
$layout->content = $content;
echo $layout;
