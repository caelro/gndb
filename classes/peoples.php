<?php
// require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "sqlite.php");

class peoples {
  // private $peopleid;
  private $db;
  public $man = array();
  // public $people_list;

  function __construct() {
    // $this->db = new sqlite("db.sqlite");
    $this->db = new PDO("sqlite:db.sqlite");
  }

  function get_list_peoples() {
    $st = $this->db->query("SELECT * FROM all_peoples");
    return $st->fetchAll();
    // $this->people_list = $this->db->queryAll("select * from peoples");
    // return $this->people_list;
  }

  function get_man($id) {
    $st = $this->db->query("SELECT * FROM peoples WHERE id=".$id);
    $res = $st->fetchAll();
    return $res[0];
  }

  function show_peoples() {
  	$res = "<tr><th>#</th><th>Ф.И.О.</th><th>Отдел</th><th>Должность</th><th>Действие</th></tr>";
  	$num = 1;
  	// foreach (get_table("all_peoples") as $val) {
  	foreach ($this->get_list_peoples() as $val) {
  		$res .= "<tr>" .
  		"<td>$num</td>" .
  		"<td><a href=\"/people/$val[id]\">$val[fullname]</a></td>" .
  		"<td>$val[department]</td>" .
      "<td>$val[position]</td>" .
  		"<td><a href=\"/people/edit/$val[id]\">редактировать</a> <a href=\"/people/del/$val[id]\" onclick=\"return confirm('Точно удалить?')\" LANGUAGE=\"Javascript\">удалить</a></td>" .
  		"</tr>\n";
  		$num++;
  	}
  	$res = "<table class=\"table_blur\">$res</table>";
  	return $res;
  }

  function show_people($id) {
  	$tmp = $this->get_man($id);
  	$res .= "<div>Фамилия: $tmp[lname] </div>";
  	$res .= "<div>Имя: $tmp[fname] </div>";
  	$res .= "<div>Отчество: $tmp[mname] </div>";
  	return $res;
  }

  function add_man($data) {
    // foreach ($data as $key => $value) {
  	// 	echo "$key - $value<br>";
  	// }
    $q = "INSERT INTO peoples (lname,fname,mname,birthday,sexid,departmentid,positionid,tab_N,orderdate) VALUES (:lname,:fname,:mname,:bday,:sex,:dep,:pos,:tN,:odate)";
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
    $before = $this->get_man($data["id"]);
    // foreach ($before as $key => $value) {
  	// 	echo "$key - $value<br>";
  	// }
    // echo "<hr>";
    // foreach ($data as $key => $value) {
    //   echo "$key - $value<br>";
    // }
    // echo "<hr>";
    $q = "UPDATE peoples SET lname=:lname,fname=:fname,mname=:mname,birthday=:bday,sexid=:sex,departmentid=:dep,positionid=:pos,tab_N=:tN,orderdate=:odate WHERE id=$data[id]";
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
    // $this->db->exec("DELETE FROM peoples WHERE id=$id");
    $this->db->exec("UPDATE peoples SET fired=1 WHERE id=$id");
  }
}

?>
