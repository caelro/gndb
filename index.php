<?php
session_start();

define('ROOT', $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER['HTTP_HOST'] . '/');
define('DOCROOT', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "sqlite.php");
require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "template.php");
require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "funcs.php");

function getURL() {
  $uri = explode('/', $_SERVER['REQUEST_URI']);
  $res .= '';
  foreach ($uri as $key => $val) {
    if ($val != '') {
      $res[] = $val;
    }
  }
  return $res;
}

echo getURL()[1];

$main = new template;
$main->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "main.tpl");

$menu = new template;
$menu->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "menu.tpl");
$menu->tpl_parse();

$content = new template;
$content->get_tpl(DOCROOT . "templates" . DIRECTORY_SEPARATOR . "content.tpl");
$content->set_tpl('{ALL_PEOPLES}', list_peoples());
$content->tpl_parse();

$main->set_tpl('{TITLE}', 'ООО "Газпром газнадзор" Волгоградский филиал');
$main->set_tpl('{ROOT}', ROOT);
$main->set_tpl('{MENU}', $menu->template);
$main->set_tpl('{CONTENT}', $content->template);
$main->tpl_parse();
print $main->template;
