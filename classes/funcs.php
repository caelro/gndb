<?php

function getdb($view) {
	$db = new sqlite('db.sqlite');
	return $db->queryAll("SELECT * FROM " . $view);
}

function setdb($args) {
	$db = new sqlite('db.sqlite');
	if ($_POST['addmission']) {
		$res = sprintf("INSERT INTO missions ('peopleid', 'typeid', 'begin', 'end', 'objectid', 'viewid', 'num', 'autoid') 
			VALUES(%s, %s, '%s', '%s', %s, %s, '%s', %s)",
			$db->clean($_POST['people']),
			$db->clean($_POST['type']),
			$db->clean($_POST['bdate']),
			$db->clean($_POST['edate']),
			is_null($_POST['obj']) ? 'NULL' : $db->clean($_POST['obj']),
			$db->clean($_POST['view']),
			is_null($_POST['num']) ? '' : $db->clean($_POST['num']),
			is_null($_POST['auto']) ? 'NULL' : $db->clean($_POST['auto'])
		);
		$db->query($res);
	}
	if ($args['addpeople']) {

	}
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

function showpeoples() {
	$res = '';
	foreach (getdb('all_peoples') as $val) {
		$res .= '<tr>' .
		'<td><a href="/people/edit/' . $val['id'] . '">' . $val['lastname'] . ' ' . $val['firstname'] . ' ' . $val['middlename'] . '</a></td>' .
		'<td>' . $val['department'] . '</td>' .
		'<td>' . $val['position'] . '</td>' .
		// '<td><a href="/people/edit/' . $val['id'] . '">редактировать</a></td>' .
		'</tr>';
	}
	// $res = '<tr><td colspan="3" align="center">' . $val['department'] . '</td></tr>' . $res;
	$res = '<table>' . $res . '</table>';
	return $res;
}

function optons_departments() {
	$res = '';
	foreach (getdb("departments") as $val) {
		$res .= '<option value="' . $val['id'] . '" name="department">' . $val['department'] . '</option>';
	}
	return $res;
}

function optons_positions() {
	$res = '';
	foreach (getdb("positions") as $val) {
		$res .= '<option value="' . $val['id'] . '" name="position">' . $val['position'] . '</option>';
	}
	return $res;
}

function optons_peoples() {
	$res = '';
	foreach (getdb("all_peoples") as $val) {
		$res .= '<option value="' . $val['id'] . '" name="people" otdel="' . $val['departmentid'] . '">' . $val['lastname'] . ' ' . $val['firstname'] . ' ' . $val['middlename'] . '</option>';
	}
	return $res;
}

function optons_types() {
	$res = '';
	foreach (getdb("mission_types") as $val) {
		$res .= '<option value="' . $val['id'] . '" name="type">' . $val['type'] . '</option>';
	}
	return $res;
}

function optons_objects() {
	$res = '';
	foreach (getdb("objects") as $val) {
		$res .= '<option value="' . $val['id'] . '" name="object">' . $val['object'] . '</option>';
	}
	return $res;
}

function optons_views() {
	$res = '';
	foreach (getdb("views") as $val) {
		$res .= '<option value="' . $val['id'] . '" name="view">' . $val['view'] . '</option>';
	}
	return $res;
}

function optons_autos() {
	$res = '';
	foreach (getdb("autos") as $val) {
		$res .= '<option value="' . $val['id'] . '" name="auto">' . $val['autotype'] . ' (' . $val['autonum'] . ')' . '</option>';
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
