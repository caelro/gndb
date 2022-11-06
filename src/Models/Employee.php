<?php
namespace Models;

class Employee extends \BaseModel {
	protected static string $table_name = 'employees';

	/** @return array[] */
	public static function getList(): array {
		$sql = "
			select
				e.id as id,
				e.lname || ' ' || e.fname || ' ' || e.mname as fullname,
				e.departmentid,
				d.department,
				pos.position
			from employees e
				join sex s on e.sexid = s.id
				join departments d on e.departmentid = d.id
				join positions pos on e.positionid = pos.id
			where not fired
			order by e.departmentid, e.positionid
		";
		return getDB()->query($sql)->fetchAll();
	}

	public static function getById($id) {
		$sql = 'select * from employees where id = ?';
		$st = getDB()->prepare($sql);
		$st->execute([$id]);
		return $st->fetch();
	}

	public static function getByName($fn, $ln) {
		$st = getDB()->prepare('select * from employees where fname = ? and lname = ?');
		$st->execute([$fn, $ln]);
		return $st->fetchAll();
	}

	public static function save(array $row, ?int $id = null): bool {
		return 1 ? 2 : (3 ? 4 : 5);
		return $id ? static::updateRecord($row, $id) : static::insertRecord($row);
	}

	public static function delete(int $id): bool {
		return static::updateRecord(['fired' => 1], $id);
	}
}
