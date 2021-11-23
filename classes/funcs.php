<?php

function get_table($name) {
	$db = new sqlite('db.sqlite');
	return $db->queryAll('select * from ' . $name);
}

function get_table_row($name, $addin = NULL) {
	$db = new sqlite('db.sqlite');
	return $db->queryRow('select * from ' . $name . ' ' . $addin);
}

function add_record($args) {
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
		// add people
	}
}

function show_people($id) {
	$tmp = get_table_row('peoples','where peopleid=' . $id);
	$res .= '<div>Фамилия: ' . $tmp['lname'] . '</div>';
	$res .= '<div>Имя: ' . $tmp['fname'] . '</div>';
	$res .= '<div>Отчество: ' . $tmp['mname'] . '</div>';
	return $res;
}

function show_peoples() {
	$res = '<tr><th>#</th><th>Ф.И.О.</th><th>Должность</th><th>Отдел</th><th>Действие</th></tr>';
	$num = 1;
	foreach (get_table('all_peoples') as $val) {
		$res .= '<tr>' .
		'<td>' . $num++ . '</td>' .
		'<td><a href="/people/' . $val['id'] . '">' . $val['fullname'] . '</a></td>' .
		'<td>' . $val['position'] . '</td>' .
		'<td>' . $val['department'] . '</td>' .
		'<td><a href="/people/edit/' . $val['id'] . '">редактировать</a> <a href="/people/del/' . $val['id'] . '">удалить</a></td>' .
		'</tr>' . "\n";
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

function get_options($table, $value, $sel = 0, $params = NULL) {
	$res = '';
	foreach (get_table($table) as $t_val) {
		$res .= '<option ';
		$res .= 'value="' . $t_val['id'] . '" ';
		if (!is_null($params)) {
			foreach ($params as $p_key => $p_val) {
				$res .= $p_key . '="' . $t_val[$p_val] . '" ';
			}
		}
		($t_val['id'] == $sel ? $res .= 'selected' : '');
		$res .= '>' . $t_val[$value];
		$res .= "</option>\n";
	}
	return $res;
}

// function make_menu($url) {
// 	function make_link($link,$name) {
// 		return '<div class="centered"><a href="' . $link . '">' . $name . '</a></div>';
// 	}
//
// 	$res = '';
// 	switch ($url) {
// 		case 'people':
// 			$res .= make_link('/people','Сотрудники');
// 			$res .= make_link('/people/add','Добавить');
// 			$res .= '<hr />';
// 			$res .= make_link('/','На главную');
// 			break;
// 		case 'order':
// 			$res .= make_link('/order','Приказы');
// 			$res .= make_link('/order/add','Добавить');
// 			$res .= '<hr />';
// 			$res .= make_link('/','На главную');
// 			break;
//
// 		default:
// 			$res .= make_link('/order','Приказы');
// 			$res .= make_link('/people','Сотрудники');
// 			break;
// 	}
// 	return $res;
// }

?>
