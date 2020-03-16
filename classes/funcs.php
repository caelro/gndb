<?php

function getpeoples() {
	$db = new sqlite('db.sqlite');
	return $db->queryAll("
		SELECT * FROM peoples
		JOIN departments ON peoples.iddepartment = departments.id
		JOIN positions ON peoples.idposition = positions.id
		WHERE peoples.iddepartment = 3
		ORDER BY peoples.iddepartment, peoples.idposition
		");
}

function showpeoples() {
	$res = '';
	foreach (getpeoples() as $val) {
		$res .= '<tr>' .
					'<td><a href="#">' . $val['lname'] . ' ' . $val['fname'] . ' ' . $val['mname'] . '</a></td>' .
					'<td>' . $val['position'] . '</td>' .
					'<td><a href="/#">delete</a></td>' .
				'</tr>';
	}
	$res = '<tr><td colspan="3" align="center">' . $val['department'] . '</td></tr>' . $res;
	$res = '<table>' . $res . '</table>';
	return $res;
}

function getmissions() {
	$db = new sqlite('db.sqlite');
	return $db->queryAll("
		SELECT * FROM missions
		JOIN peoples ON peoples.id = missions.idpeople
		JOIN mission_types ON mission_types.id = missions.type
		JOIN objects ON objects.id = missions.object
		-- WHERE missions.id = 1
		-- ORDER BY peoples.iddepartment, peoples.idposition
		");
}

function showmissions() {
	$res = '';
	foreach (getmissions() as $val) {
		$res .= $val['lname'] . ' ' 
			. $val['fname'] . ' ' 
			. $val['object'] . ' '
			. $val['place'] . ' ' 
			. 'с ' . $val['begin'] . ' ' 
			. 'по ' . $val['end'] . ' ' 
			. '<br />';
	}
	return $res;
}
