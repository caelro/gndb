<?php
session_start();

define('ROOT', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/');
define('DOCROOT', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

require_once(DOCROOT . 'classes' . DIRECTORY_SEPARATOR . 'sqlite.php');
require_once(DOCROOT . 'classes' . DIRECTORY_SEPARATOR . 'template.php');
require_once(DOCROOT . 'classes' . DIRECTORY_SEPARATOR . 'funcs.php');

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
//         if($_POST['addmission']) {
//             // add mission in DB
//             insert_order($_POST);
//             header('Location: ' . $_SERVER['REQUEST_URI']);
//             exit;
//         }
//     }
// }

$url = getURL();
// $content = new template;
// $content->set_tpl('{OPTIONS_POSITIONS}', get_optons('positions', array('position', 'position')));
switch ($url[1]) {
	case 'people':
		$content = new template('people.tpl');
		switch ($url[2]) {
			case 'add':
				// Add new man
				break;
			case 'edit':
				// edit selected man
				$tmp=get_table('peoples','where peopleid=' . $url[3]);
				$content->val_lname=$tmp[0]['lname'];
				$content->val_fname=$tmp[0]['fname'];
				$content->val_mname=$tmp[0]['mname'];
				$content->options_sex=get_options('sex', 'sex', $tmp[0]['sexid']);
				$content->val_bday=$tmp[0]['birthday'];
				$content->val_tabn=$tmp[0]['tab_N'];
				$content->options_departments=get_options('departments', 'department', $tmp[0]['departmentid']);
				$content->options_positions=get_options('positions', 'position', $tmp[0]['positionid']);
				break;
			default:
				$content = new template('list.tpl');
				$content->list_head='Список сотрудников:';
				$content->list_body=show_peoples();
				// header('Location: ' . $_SERVER['REQUEST_URI'] . '/add/');
				break;
		}
		break;
	case 'order':
		$content = new template('mission.tpl');
  	// $content->get_tpl(DOCROOT . 'templates' . DIRECTORY_SEPARATOR . 'content.tpl');
    // $content->set_tpl('{CONT_HEAD}', 'Список событий:');
		switch ($url[2]) {
			case 'add':
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
  //       $content->get_tpl(DOCROOT . 'templates' . DIRECTORY_SEPARATOR . 'report.tpl');
	// break;
	default:
		$content = new template('content.tpl');
		$content->cont_head='ООО "Газпром газнадзор"<br>филиал Волгоградское управление';
		$content->cont_body='<h3><---<br><--- Выбирайте необходимый параметр из меню слева<br><---</h3>';
		break;
}
// $content->tpl_parse();

$menu=make_menu($url[1]);
// $cont=$content->template;
// $cont = $content;
?>

<!DOCTYPE html>
<html lang='ru'>
<head>
	<meta charset='utf-8'>
	<!-- <meta name='viewport' content='width=device-width, initial-scale=1.0'> -->
	<title>ООО "Газпром газнадзор" Волгоградский филиал</title>
	<!-- <link rel='stylesheet' href='../css/bootstrap.css'/> -->
	<!-- <link rel='stylesheet' href='../css/font-awesome.min.css'> -->
	<link rel='stylesheet' href='<?=ROOT;?>css/style.css'/>
	<script src='<?=ROOT;?>js/jquery-3.4.1.min.js'></script>
</head>
<body>
	<div class='container'>
				<div class='menu'>
					<?= $menu; ?>
				</div>
				<div class='content'>
					<?= $content; ?>
				</div>
	</div>
	<!-- <script src='../js/bootstrap.min.js'></script> -->
</body>
</html>
