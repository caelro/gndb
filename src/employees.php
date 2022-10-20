<?php

class employees {
  private $db;
  public $man = array();

  function __construct() {
    $this->db = getDB();
  }

  function get_list() {
    $st = $this->db->query("SELECT * FROM all_employees");
    return $st->fetchAll();
  }

  function get_by_id($id) {
    $st = $this->db->query("SELECT * FROM employees WHERE id=$id");
    $res = $st->fetchAll();
    return $res[0];
  }

  function get_by_name($fn, $ln) {
    $st = $this->db->query("SELECT * FROM employees WHERE fname=$fn AND lname=$ln");
    return $st->fetchAll();
  }

  function get_list_html() {
		//todo: а в чём прикол было заводить шаблоны, если в итоге htm формируется даже не в контроллере, а в модели? :)
  	$res = "<tr><th>#</th><th>Ф.И.О.</th><th>Отдел</th><th>Должность</th><th>Действие</th></tr>";
  	$num = 1;
  	foreach ($this->get_list() as $val) {
  		$res .= "<tr>" .
  		"<td>$num</td>" .
  		"<td><a href=\"/employees/edit/$val[id]\">$val[fullname]</a></td>" .
  		"<td>$val[department]</td>" .
      "<td>$val[position]</td>" .
			//todo: навешивать обработчики на каждую строку - плохо, тем более не вызов функции, а прям текст. потом разберёмся
			//todo: и хуже всего, что если жс не работает, то удаление будет без запроса. надо чтобы наоборот удаление работало только если сработал жс
  		"<td><a href=\"/employees/edit/$val[id]\">редактировать</a> <a href=\"/employees/del/$val[id]\" onclick=\"return confirm('Точно удалить?')\" LANGUAGE=\"Javascript\">удалить</a></td>" .
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

  function add_man($data) {
    // foreach ($data as $key => $value) {
  	// 	echo "$key - $value<br>";
  	// }
    $q = "INSERT INTO employees (lname,fname,mname,birthday,sexid,departmentid,positionid,tab_N,orderdate) VALUES (:lname,:fname,:mname,:bday,:sex,:dep,:pos,:tN,:odate)";
    $stmt = $this->db->prepare($q);
    $stmt->execute([
      ":lname"=>$data[lname],
      ":fname"=>$data[fname],
      ":mname"=>$data[mname],
      ":bday"=>$data[bday] ? $data[bday] : NULL,
      ":sex"=>$data[sex],
      ":dep"=>$data[department],
      ":pos"=>$data[position],
      ":tN"=>$data[tabN] ? $data[tabN] : NULL,
      ":odate"=>$data[odate] ? $data[odate] : NULL
    ]);
  }

  function update_man($data) {
    $before = $this->get_by_id($data["id"]);
    // foreach ($before as $key => $value) {
  	// 	echo "$key - $value<br>";
  	// }
    // echo "<hr>";
    // foreach ($data as $key => $value) {
    //   echo "$key - $value<br>";
    // }
    // echo "<hr>";
    $q = "UPDATE employees SET lname=:lname,fname=:fname,mname=:mname,birthday=:bday,sexid=:sex,departmentid=:dep,positionid=:pos,tab_N=:tN,orderdate=:odate WHERE id=$data[id]";
    $stmt = $this->db->prepare($q);
    $stmt->execute([
      ":lname"=>$data[lname],
      ":fname"=>$data[fname],
      ":mname"=>$data[mname],
      ":bday"=>$data[bday] ? $data[bday] : NULL,
      ":sex"=>$data[sex],
      ":dep"=>$data[department],
      ":pos"=>$data[position],
      ":tN"=>$data[tabN] ? $data[tabN] : NULL,
      ":odate"=>$data[odate] ? $data[odate] : NULL
    ]);
  }

  function del_man($id) {
    // $this->db->exec("DELETE FROM employees WHERE id=$id");
    $this->db->exec("UPDATE employees SET fired=1 WHERE id=$id");
  }
}
