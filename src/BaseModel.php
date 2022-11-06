<?php
class BaseModel {
	protected static string $table_name;

	protected static function insertRecord(array $data, string $mode = 'normal'): bool {
		if (!$data) return false;
		$db = getDB();
		$sql = [
			match ($mode) {
				'ignore' => 'insert or ignore',
				'replace' => 'replace',
				default => 'insert'
			},
			'into',
			$db->quote(static::$table_name),
			'(' . implode(', ', array_map(static fn($name) => $db->quote($name), array_keys($data))) . ')',
			'values',
			'(' . implode(', ', array_fill(0, count($data), '?')) . ')',
		];
		return $db->prepare(implode(' ', $sql))->execute(array_values($data));
	}

	protected static function updateRecord(array $data, int $id): bool {
		if (!$data) return true;
		$db = getDB();
		$sql = [
			'update',
			$db->quote(static::$table_name),
			'set',
			implode(', ', array_map(static fn($name) => "{$db->quote($name)} = ?", array_keys($data))),
			'where id = ?'
		];
		return $db->prepare(implode(' ', $sql))->execute([...array_values($data), $id]);
	}
}