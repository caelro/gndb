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
    $this->man = $this->db->queryRow("select * from peoples where id=".$id);
    return $this->man;
  }

  function add_man($data) {
    // foreach ($data as $key => $value) {
  	// 	echo "$key - $value<br>";
  	// }
    $q = "INSERT INTO peoples (lname,fname,mname,birthday,sexid,departmentid,positionid,tab_N) VALUES (:lname,:fname,:mname,:bday,:sex,:dep,:pos,:tN)";
    $stmt = $this->db->prepare($q);
    $stmt->execute([
      ":lname"=>$data[lname],
      ":fname"=>$data[fname],
      ":mname"=>$data[mname],
      ":bday"=>$data[bday] ? $data[bday] : NULL,
      ":sex"=>$data[sex],
      ":dep"=>$data[department],
      ":pos"=>$data[position],
      ":tN"=>$data[tabN] ? $data[tabN] : NULL
    ]);
  }

  function update_man($id, $data) {

  }

  function del_man($id) {

  }
}

?>
