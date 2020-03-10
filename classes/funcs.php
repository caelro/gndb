<?php

global $db;

function getlist() {
	$db = new sqlite('db.sqlite');
	return $db->queryAll("SELECT * FROM peoples JOIN departments ON peoples.iddepartment = departments.id ORDER BY iddepartment,lname");
}

function list_peoples() {
	$res = '';
	foreach (getlist() as $val) {
		$res .= '<tr><td>' . $val['lname'] . '</td>' .
					'<td>' . $val['fname'] . '</td>' .
					'<td>' . $val['department'] . '</td>' .
				'</tr>';
	}
	return $res;
}
