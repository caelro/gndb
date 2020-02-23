<?php
require("classes/sqlite.php");
require("classes/template.php");


$parse->get_tpl('templates/main.tpl'); //Файл который мы будем парсить
$parse->set_tpl('{TITLE}', 'Супер сайт'); //Установка переменной {TITLE}
$parse->tpl_parse(); //Парсим
print $parse->template; //Выводим нашу страничку


// initialize
//$db = new sqlite('db.sqlite');