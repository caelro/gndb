<?php

function get_table($name) {
	$db = new sqlite('db.sqlite');
	return $db->queryAll('select * from ' . $name);
}

function show_peoples() {
	$res = '<tr><th>#</th><th>Ф.И.О.</th><th>Должность</th><th>Отдел</th><th>Действие</th></tr>';
	$num = 1;
	foreach (get_table('all_peoples') as $val) {
		$res .= '<tr>' .
		'<td>' . $num++ . '</td>' .
		'<td><a href="/people/edit/' . $val['id'] . '">' . $val['fullname'] . '</a></td>' .
		'<td>' . $val['position'] . '</td>' .
		'<td>' . $val['department'] . '</td>' .
		'<td><a href="/people/del/' . $val['id'] . '">удалить</a></td>' .
		'</tr>';
	}
	// $res = '<tr><td colspan="3" align="center">' . $val['department'] . '</td></tr>' . $res;
	$res = '<table class="table_blur">' . $res . '</table>';
	return $res;
}

function show_orders() {
	$res = '<tr><th>#</th><th>Ф.И.О.</th><th>Отдел</th><th>Тип</th><th>Период</th></tr>';
	$num = 1;
	foreach (get_table('all_orders_2021') as $val) {
		$res .= '<tr>' .
		'<td>' . $num++ . '</td>' .
		'<td>' . $val['fullname'] . '</td>' .
		'<td>' . $val['department'] . '</td>' .
		'<td>' . $val['type'] . '</td>' .
		'<td> с ' . date("d.m.Y", strtotime($val['bdate'])) . ' по ' . ($val['edate'] != '' ? date("d.m.Y", strtotime($val['edate'])) : 'Н.В.') . '</td>' .
		'</tr>';
	}
	$res = '<table class="table_blur">' . $res . '</table>';
	return $res;
}

function get_options($table, $value, $sel, $params = NULL) {
	$res = '';
	foreach (get_table($table) as $t_val) {
		$res .= '<option ';
		$res .= 'value="' . $t_val['id'] . '" ';
		foreach ($params as $p_key => $p_val) {
			$res .= $p_key . '="' . $t_val[$p_val] . '" ';
		}
		// $res .= '" name="' . $name[0];
		// $res .= (isset($addin) ? '" ' . $addin[0] . '="' . $val[$addin[1]] : '');
		// $res .= '" {VAL_' . $name[0] . '_' . $val['id'] . '}>';
		$res .= '>' . $t_val[$value];
		$res .= "</option>\n";
	}
	return $res;
}

function make_menu($url) {
	function make_link($link,$name) {
		return '<div class="centered"><a href="' . $link . '">' . $name . '</a></div>';
	}

	$res = '';
	switch ($url) {
		case 'people':
			$res .= make_link('/people/add','Добавить');
			$res .= '<hr />';
			$res .= make_link('/','На главную');
			break;

		default:
			$res .= make_link('/order','Приказы');
			$res .= make_link('/people','Сотрудники');
			break;
	}
	return $res;
}





function getdb($view) {
	$db = new sqlite('db.sqlite');
	return $db->queryAll("SELECT * FROM " . $view);
}

function insert_order($args) {
	$db = new sqlite('db.sqlite');
	if ($args['addmission']) {
		$res = sprintf("INSERT INTO orders ('peopleid', 'typeid', 'bdate', 'edate', 'object', 'numorder', 'autoid', 'SZsend', 'AOsend', 'AOreceive')
			VALUES(%s, %s, '%s', '%s', '%s', '%s', '%s', %d, %d, %d)",
			$db->clean($args['people']),
			$db->clean($args['type']),
			$db->clean($args['bdate']),
			isset($args['edate']) ? $db->clean($args['edate']) : NULL,
			isset($args['obj']) ? $db->clean($args['obj']) : NULL,
			isset($args['num']) ? $db->clean($args['num']) : NULL,
			isset($args['auto']) ? $db->clean($args['auto']) : NULL,
			$db->clean($args['SZsend']),
			$db->clean($args['AOsend']),
			$db->clean($args['AOreceive'])
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

function get_optons($db, $name, $addin = NULL) {
	$res = '';
	foreach (getdb($db) as $val) {
		$res .= '<option value="' . $val['id'] . '" name="' . $name[0] . (isset($addin) ? '" ' . $addin[0] . '="' . $val[$addin[1]] : '') . '" {VAL_' . $name[0] . '_' . $val['id'] . '}>' . $val[$name[1]] . '</option>';
		$res .= "\n";
	}
	return $res;
}

?>
