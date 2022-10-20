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

function insert_record(string $table_name, array $data, string $mode = 'normal'): bool {
	if (!$data) return false;
	$db = getDB();
	$sql = [
		match ($mode) {
			'ignore' => 'insert or ignore',
			'replace' => 'replace',
			default => 'insert'
		},
		'into',
		$db->quote($table_name),
		'(' . implode(', ', array_map(static fn($name) => $db->quote($name), array_keys($data))) . ')',
		'values',
		'(' . implode(', ', array_fill(0, count($data), '?')) . ')',
	];
	return $db->prepare(implode(' ', $sql))->execute(array_values($data));
}

function update_record(string $table_name, array $data, int $id): bool {
	if (!$data) return true;
	$db = getDB();
	$sql = [
		'update',
		$db->quote($table_name),
		'set',
		implode(', ', array_map(static fn($name) => "{$db->quote($name)} = ?", array_keys($data))),
		'where id = ?'
	];
	return $db->prepare(implode(' ', $sql))->execute([...array_values($data), $id]);
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
