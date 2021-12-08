<?php
// require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "sqlite.php");

class peoples {
  // private $peopleid;
  private $db;
  public $man = array();
  public $people_list;

  function __construct() {
    // $this->db = new sqlite("db.sqlite");
    $this->db = new PDO("sqlite:db.sqlite");
  }

  function get_list_peoples() {
    $this->people_list = $this->db->queryAll("select * from peoples");
    return $this->people_list;
  }

  function get_man($id) {
    $this->man = $this->db->queryRow("select * from peoples where id=".$id);
    return $this->man;
  }

  function add_man($data) {
    // foreach ($data as $key => $value) {
  	// 	echo "$key - $value<br>";
  	// }
    // $q = sprintf("INSERT INTO peoples (lname,fname,mname,birthday,sexid,departmentid,positionid,tab_N) VALUES ('%s','%s','%s','%s',%d,%d,%d,'%s')",
    //   $this->db->clean($data[lname]),
    //   $this->db->clean($data[fname]),
    //   $this->db->clean($data[mname]),
    //   $this->db->clean($data[bday] ? $data[bday] : NULL),
    //   $this->db->clean($data[sex]),
    //   $this->db->clean($data[department]),
    //   $this->db->clean($data[position]),
    //   $this->db->clean($data[tabN] ? $data[tabN] : NULL)
    // );
    $q = "INSERT INTO peoples (lname,fname,mname,birthday,sexid,departmentid,positionid,tab_N) VALUES (:lname,:fname,:mname,:bday,:sex,:dep,:pos,:tN)";
    $stmt = $this->db->prepare($q);
    $stmt->bindValue(":lname",$data[lname]);
    $stmt->bindValue(":fname",$data[fname]);
    $stmt->bindValue(":mname",$data[mname]);
    $stmt->bindValue(":bday",$data[bday] ? $data[bday] : NULL);
    $stmt->bindValue(":sex",$data[sex]);
    $stmt->bindValue(":dep",$data[department]);
    $stmt->bindValue(":pos",$data[position]);
    $stmt->bindValue(":tN",$data[tabN] ? $data[tabN] : NULL);
    $stmt->execute();
    // echo $q;
    // $this->db->query($q);
  }

  function update_man($id, $data) {

  }

  function del_man($id) {

  }
}

?>
