<?php
require("classes/sqlite.php");
require("classes/template.php");
$parse->get_tpl('templates/main.tpl'); //Файл который мы будем парсить
$parse->set_tpl('{TITLE}', 'Супер сайт'); //Установка переменной {TITLE}
$parse->set_tpl('{BGCOLOR}', '#F2F2F2'); //Установка переменной { BGCOLOR }
$parse->set_tpl('{SOMETPLTAGS}', '<span style="color: red; ">Это текст обрамленый красным  цветом</span>'); //Установка переменной {SOMETPLTAGS}
$parse->tpl_parse(); //Парсим
print $parse->template; //Выводим нашу страничку


// initialize
$db = new sqlite('db.sqlite');

$query = 'DROP TABLE IF EXISTS "foobar";';
try {
    $db->query($query);
} catch (Exception $e) {
}

$query = 'DROP TABLE IF EXISTS "peoples";';
try {
    $db->query($query);
} catch (Exception $e) {
}

$query = 'CREATE TABLE IF NOT EXISTS "peoples" ("id" INTEGER PRIMARY KEY AUTOINCREMENT, "name" TEXT, "birthday" DATE);';
try {
    $db->query($query);
} catch (Exception $e) {
}