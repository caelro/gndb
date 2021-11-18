<?php
session_start();

define('ROOT', $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER['HTTP_HOST'] . '/');
define('DOCROOT', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "sqlite.php");
require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "template.php");
require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "funcs.php");

function getURL() {
	$uri = explode('/', $_SERVER['REQUEST_URI']);
	foreach ($uri as $key => $val) {
			$res[$key] = $val;
	}
	return $res;
}


// if($_POST) {
//     if($_POST['report'])
//         $url[0]='report';
//     else {
//         if($_POST["addmission"]) {
//             // add mission in DB
//             insert_order($_POST);
//             header("Location: " . $_SERVER['REQUEST_URI']);
//             exit;
//         }
//     }
// }

// $main = new template;
// $main->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "main.tpl");

// $menu = new template;
// $menu->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "menu.tpl");
// $menu->set_tpl('{OPTIONS_DEPARTMENTS}', optons_departments());
// $menu->tpl_parse();

$url = getURL();
// $content = new template;
// $content->set_tpl('{OPTIONS_DEPARTMENTS}', get_optons('departments', array('department', 'department')));
// $content->set_tpl('{OPTIONS_POSITIONS}', get_optons('positions', array('position', 'position')));
switch ($url[1]) {
	case 'people':
		// $content = new template(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "people.tpl");
		switch ($url[2]) {
		// $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "content.tpl");
		// $content->set_tpl('{CONT_HEAD}', 'Список сотрудников:');
			case 'add':
				// Add new man
				// $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "people.tpl");
				// $content->set_tpl('{HIDDEN_2}', "hidden");
				break;
			case 'edit':
				// edit selected man
				// $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "people.tpl");
				// $content->set_tpl('{VAL_LNAME}', 'value="Tsybulin"');
				$val_lname="Tsybulin";
				// $content->set_tpl('{VAL_FNAME}', 'value="Alex"');
				// $content->set_tpl('{VAL_MNAME}', "");
				// $content->set_tpl('{VAL_SEX_1}', "selected");
				// $content->set_tpl('{VAL_BDAY}', 'value="1981-04-09"');
				// $content->set_tpl('{VAL_department_3}', "selected");
				// $content->set_tpl('{VAL_position_3}', "selected");
				// $content->set_tpl('{HIDDEN_1}', "hidden");
				break;
			default:
				// $content->set_tpl('{CONT_BODY}', show_peoples());
				// header("Location: " . $_SERVER['REQUEST_URI'] . "/add/");
				break;
		}
		break;
	case 'order':
  	// $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "content.tpl");
    // $content->set_tpl('{CONT_HEAD}', 'Список событий:');
		switch ($url[2]) {
			case 'add':
        // $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "mission.tpl");
				// $content->set_tpl('{OPTIONS_DEPARTMENTS}', get_optons('departments', array('department', 'department')));
        // $content->set_tpl('{OPTIONS_PEOPLES}', get_optons('all_peoples', array('people', 'fullname'), array('otdel','departmentid')));
        // $content->set_tpl('{OPTIONS_PEOPLES}', get_options('all_peoples', 'fullname', 0, array('otdel'=>'departmentid')));
        // $content->set_tpl('{OPTIONS_TYPES}', get_options('all_types', 'type', 0));
        // $content->set_tpl('{OPTIONS_OBJ}', get_optons('objects', array('object', 'object')));
        // $content->set_tpl('{OPTIONS_VIEW}', get_optons('views', 'view'));
        // $content->set_tpl('{OPTIONS_AUTO}', get_optons('all_autos', array('auto', 'auto')));
				break;
			case 'edit':
				break;

			default:
				// $content->set_tpl('{CONT_BODY}', show_orders());
				# code...
				break;
		}
		break;
	// case 'report':
  //       $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "report.tpl");
	// break;
	default:
  	// $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "content.tpl");
		// $content = new template(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "content.tpl");
		// $content->cont_body='<h1>ЗДРАВСТВУЙТЕ!<br>Выбирайте необходимый параметр из меню слева<br><---</h1>';
		break;
}
// $content->tpl_parse();

$title='ООО "Газпром газнадзор" Волгоградский филиал';
$root=ROOT;
// $menu=$menu->template;
$menu=make_menu($url[1]);
// $cont=$content->template;
// $cont = $content;
?>

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
