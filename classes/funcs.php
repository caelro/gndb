<?php

global $db;

function getlist() {
	$db = new sqlite('db.sqlite');
	return $db->queryAll("
		SELECT * FROM peoples
		JOIN departments ON peoples.iddepartment = departments.id
		JOIN positions ON peoples.idposition = positions.id
		WHERE peoples.iddepartment = 3
		ORDER BY peoples.iddepartment, peoples.idposition
		");
}

function list_peoples() {
	foreach (getlist() as $val) {
		$res .= '<tr>' .
					'<td><a href="#">' . $val['lname'] . ' ' . $val['fname'] . ' ' . $val['mname'] . '</a></td>' .
					'<td>' . $val['position'] . '</td>' .
					'<td><a href="/#">delete</a></td>' .
				'</tr>';
	}
	$res = '<tr><td colspan="3" align="center">' . $val['department'] . '</td></tr>' . $res;
	return $res;
}
