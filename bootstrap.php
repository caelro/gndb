<?php
error_reporting(E_ALL);
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Moscow');
const PROJECT_ROOT = __DIR__;
const DB_DSN = 'sqlite:' . PROJECT_ROOT . '/data/db.sqlite';
const DATE_DATETIME = 'Y-m-d H:i:s';
const DATE_DATE = 'Y-m-d';
const DATE_USER = 'd.m.Y';

require 'src/Autoloader.php';
require 'src/functions.php';
Autoloader::register(PROJECT_ROOT);
Autoloader::includePath([
	'/src',
	//'/vendor/SomeLibraryName/src',
]);

Router::add('get', '/employees', [\Controllers\Employees::class, 'index']);
Router::add('get,post', '/employees/add', [\Controllers\Employees::class, 'add']);
Router::add('get,post', '/employees/edit/(\d+)', [\Controllers\Employees::class, 'edit']);
Router::add('get', '/employees/delete/(\d+)', [\Controllers\Employees::class, 'delete']);
Router::add('get', '/orders', [\Controllers\Orders::class, 'index']);
Router::add('get,post', '/orders/add', [\Controllers\Orders::class, 'add']);
Router::add('get', '/', static fn() => new Template('welcome'));

echo Template::render('main', [
	'content' => Router::getResponse()
]);
