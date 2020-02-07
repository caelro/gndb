<?php
require("classes/sqlite.php");
require("classes/template.php");
// TODO: read global settings
// TODO: connect all classes
// TODO: run main program
$parse->get_tpl('templates/main.tpl'); //Файл который мы будем парсить
$parse->set_tpl('{TITLE}', 'Супер сайт'); //Установка переменной {TITLE}
$parse->set_tpl('{BGCOLOR}', '#F2F2F2'); //Установка переменной { BGCOLOR }
$parse->set_tpl('{SOMETPLTAGS}', '<span style="color: red; ">Это текст обрамленый красным  цветом</span>'); //Установка переменной {SOMETPLTAGS}
$parse->tpl_parse(); //Парсим
print $parse->template; //Выводим нашу страничку


// initialize
$db = new sqlite('db.sqlite');

// create the database structure
$query = 'CREATE TABLE IF NOT EXISTS "foobar" (
            "id" INTEGER PRIMARY KEY AUTOINCREMENT,
            "name" TEXT
          );';
$db->query($query);
