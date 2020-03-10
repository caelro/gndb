<?php
require_once("classes/sqlite.php");
require_once("classes/template.php");
require_once("classes/funcs.php");

$main = new template;
$main->get_tpl('templates/main.tpl');

$menu = new template;
$menu->get_tpl('templates/menu.tpl');
$menu->tpl_parse();

$content = new template;
$content->get_tpl('templates/content.tpl');
$content->set_tpl('{ALL_PEOPLES}', list_peoples());
$content->tpl_parse();

$main->set_tpl('{TITLE}', 'ООО "Газпром газнадзор" Волгоградский филиал');
$main->set_tpl('{MENU}', $menu->template);
$main->set_tpl('{CONTENT}', $content->template);
$main->tpl_parse();
print $main->template;
