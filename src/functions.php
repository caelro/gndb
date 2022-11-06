<?php

function redirect($url): never {
	header('Location: ' . $url);
	exit;
}

function getDB(): PDO {
	static $db;
	if (!$db) {
		$db = new PDO(DB_DSN, options: [
			PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]);
		$db->exec('pragma foreign_keys = 1');
	}
	return $db;
}

//todo удалить, заменив на использование моделей. а предварительно доработать единственное место, где она используется
function get_table(string $name): array|false {
	return getDB()->query("SELECT * FROM " . $name)->fetchAll();
}
