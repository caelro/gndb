<?php

class Employees {
	private string $table_name = 'employees';

  function get_list() {
		return getDB()->query("select * from all_employees")->fetchAll();
  }

  function get_by_id($id) {
    $st = getDB()->prepare("select * from employees where id = ?");
		$st->execute([$id]);
    return $st->fetch();
  }

  function get_by_name($fn, $ln) {
    $st = getDB()->prepare('select * from employees where fname = ? and lname = ?');
		$st->execute([$fn, $ln]);
    return $st->fetchAll();
  }

  function get_list_html() {
		//todo: а в чём прикол было заводить шаблоны, если в итоге htm формируется даже не в контроллере, а в модели? :)
  	$res = "<tr><th>#</th><th>Ф.И.О.</th><th>Отдел</th><th>Должность</th><th></th></tr>";
  	$num = 1;
  	foreach ($this->get_list() as $val) {
  		$res .= "<tr>" .
  		"<td>$num</td>" .
  		"<td><a href=\"/employees/edit/$val[id]\">$val[fullname]</a></td>" .
  		"<td>$val[department]</td>" .
      "<td>$val[position]</td>" .
			//todo: навешивать обработчики на каждую строку - плохо, тем более не вызов функции, а прям текст. потом разберёмся
			//todo: и хуже всего, что если жс не работает, то удаление будет без запроса. надо чтобы наоборот удаление работало только если сработал жс
  		"<td><a href=\"/employees/edit/$val[id]\"><i class=\"fa fa-pencil\"></i></a> <a href=\"/employees/del/$val[id]\" onclick=\"return confirm('Точно удалить?')\" LANGUAGE=\"Javascript\"><i class=\"far fa-trash-can\"></i></a></td>" .
  		"</tr>\n";
  		$num++;
  	}
  	$res = "<table class=\"table_blur\">$res</table>";
  	return $res;
  }

  function get_employee_info_html($id) {
		$result = '';
  	$row = $this->get_by_id($id);
  	$result .= "<div>Фамилия: {$row['lname']} </div>";
  	$result .= "<div>Имя: {$row['fname']} </div>";
  	$result .= "<div>Отчество: {$row['mname']} </div>";
  	return $result;
  }

  function save(array $row, ?int $id = null): bool {
		return $id ? update_record($this->table_name, $row, $id) : insert_record($this->table_name, $row);
  }

  function delete(int $id): bool {
		return update_record($this->table_name, ['fired' => 1], $id);
  }
}
