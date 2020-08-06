<?php
session_start();

define('ROOT', $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER['HTTP_HOST'] . '/');
define('DOCROOT', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "sqlite.php");
require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "template.php");
require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "funcs.php");

function getURL() {
	$uri = explode('/', $_SERVER['REQUEST_URI']);
	$res = '';
	foreach ($uri as $key => $val) {
		if ($val != '') {
			$res[] = $val;
		}
	}
	return $res;
}

$url = getURL(); // echo getURL()[0];

if($_POST) {
    if($_POST['report'])
        $url[0]='report';
    else {
        if($_POST["addmission"]) {
            // add mission in DB
            setdb($_POST);
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }
    }
}

$main = new template;
$main->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "main.tpl");

$menu = new template;
$menu->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "menu.tpl");
$menu->set_tpl('{OPTIONS_DEPARTMENTS}', optons_departments());
$menu->tpl_parse();

$content = new template;
$content->set_tpl('{OPTIONS_DEPARTMENTS}', optons_departments());
$content->set_tpl('{OPTIONS_POSITIONS}', optons_positions());
switch ($url[0]) {
	case 'peoples':
	    $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "content.tpl");
	    $content->set_tpl('{CONT_HEAD}', 'Список сотрудников:');
		$content->set_tpl('{CONT_BODY}', showpeoples());
	break;
	case 'addpeople':
	    $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "people.tpl");
	break;
	case 'missions':
        $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "content.tpl");
        $content->set_tpl('{CONT_HEAD}', 'Список миссий:');
		// $content->set_tpl('{CONT_BODY}', showmissions());
	break;
	case 'addmission':
        $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "mission.tpl");
		// $content->set_tpl('{OPTIONS_DEPARTMENTS}', optons_departments());
        $content->set_tpl('{OPTIONS_PEOPLES}', optons_peoples());
        $content->set_tpl('{OPTIONS_TYPES}', optons_types());
        $content->set_tpl('{OPTIONS_OBJ}', optons_objects());
        $content->set_tpl('{OPTIONS_VIEW}', optons_views());
        $content->set_tpl('{OPTIONS_AUTO}', optons_autos());
	break;
	case 'report':
        $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "report.tpl");
	break;
	default:
        $content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "content.tpl");
	break;
}
$content->tpl_parse();

$main->set_tpl('{TITLE}', 'ООО "Газпром газнадзор" Волгоградский филиал');
$main->set_tpl('{ROOT}', ROOT);
$main->set_tpl('{MENU}', $menu->template);
$main->set_tpl('{CONTENT}', $content->template);
$main->tpl_parse();
print $main->template;
