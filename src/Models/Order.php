<?php
namespace Models;

class Order extends \BaseModel {
	protected static string $table_name = 'orders';

	/** @return array[] */
	public static function getList($year = null) {
		if (!$year) $year = date('Y');
		$sql = "
			SELECT
				o.id,
				e.lname || ' ' || e.fname || ' ' || e.mname AS fullname,
				d.department,
				mt.type,
				date('now', 'start of month') AS bmonth,
				o.bdate,
				o.edate,
				date('now', 'start of month', '+1 month', '-1 day') AS emonth,
				o.object,
				o.numorder,
				o.AOsend,
				o.AOreceive
			FROM orders AS o
				JOIN employees AS e ON e.id = o.employee_id
				JOIN departments AS d ON e.departmentid = d.id
				JOIN order_types AS mt ON mt.id = o.typeid
			WHERE o.edate <= date('$year-12-31');
		";
		return getDB()->query($sql)->fetchAll();
	}
}
