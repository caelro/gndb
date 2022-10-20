<?php

function getDB(): PDO {
	static $db;
	if (!$db) {
		$db = new PDO(DB_DSN, options: [
			PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]);
		$db->exec('PRAGMA foreign_keys = 1');
	}
	return $db;
}

function get_table(string $name): array|false {
	return getDB()->query("SELECT * FROM " . $name)->fetchAll();
}

function get_select_options_html(string $table, string $value_column_name, $current_value = 0, $params = null): string {
	$result = '';
	foreach (get_table($table) as $row) {
		$result .= "<option ";
		$result .= "value=\"{$row['id']}\" ";
		if (!is_null($params)) {
			foreach ($params as $p_key => $p_val) {
				$result .= "$p_key=\"$row[$p_val]\" ";
			}
		}
		if ($row['id'] == $current_value) $result .= " selected";
		$result .= ">" . $row[$value_column_name];
		$result .= "</option>\n";
	}
	return $result;
}
