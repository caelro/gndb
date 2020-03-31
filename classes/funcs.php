<?php

function getdb($view) {
	$db = new sqlite('db.sqlite');
	return $db->queryAll("SELECT * FROM " . $view);
}

// function getmissions() {
// 	$db = new sqlite('db.sqlite');
// 	return $db->queryAll("
// 		SELECT * FROM missions
// 		JOIN peoples ON peoples.id = missions.idpeople
// 		JOIN mission_types ON mission_types.id = missions.type
// 		JOIN objects ON objects.id = missions.object
// 		");
// }

// function showpeoples() {
// 	$res = '';
// 	foreach (getpeoples() as $val) {
// 		$res .= '<tr>' .
// 					'<td><a href="#">' . $val['lname'] . ' ' . $val['fname'] . ' ' . $val['mname'] . '</a></td>' .
// 					'<td>' . $val['position'] . '</td>' .
// 					'<td><a href="/#">delete</a></td>' .
// 				'</tr>';
// 	}
// 	$res = '<tr><td colspan="3" align="center">' . $val['department'] . '</td></tr>' . $res;
// 	$res = '<table>' . $res . '</table>';
// 	return $res;
// }

function optons_departments() {
	$res = '';
	foreach (getdb("departments") as $val) {
		$res .= '<option style="color:black" value="' . $val['id'] . '" name="department">' . $val['department'] . '</option>';
	}
	return $res;
}

function optons_peoples() {
	$res = '';
	foreach (getdb("all_peoples") as $val) {
		$res .= '<option style="color:black" value="' . $val['id'] . '" name="people" otdel="' . $val['departmentid'] . '">' . $val['lastname'] . ' ' . $val['firstname'] . ' ' . $val['middlename'] . '</option>';
	}
	return $res;
}

function optons_types() {
	$res = '';
	foreach (getdb("mission_types") as $val) {
		$res .= '<option style="color:black" value="' . $val['id'] . '" name="type">' . $val['type'] . '</option>';
	}
	return $res;
}

function optons_objects() {
	$res = '';
	foreach (getdb("objects") as $val) {
		$res .= '<option style="color:black" value="' . $val['id'] . '" name="object">' . $val['object'] . '</option>';
	}
	return $res;
}

// function showmissions() {
// 	$res = '';
// 	foreach (getmissions() as $val) {
// 		$res .= $val['lname'] . ' ' 
// 			. $val['fname'] . ' ' 
// 			. $val['object'] . ' '
// 			. $val['place'] . ' ' 
// 			. 'с ' . $val['begin'] . ' ' 
// 			. 'по ' . $val['end'] . ' ' 
// 			. '<br />';
// 	}
// 	return $res;
// }
