<?php
// require_once(DOCROOT . "classes" . DIRECTORY_SEPARATOR . "sqlite.php");

class peoples {
  // private $peopleid;
  private $db;
  public $man = array();
  public $people_list;

  function __construct() {
    $this->db = new sqlite("db.sqlite");
  }

  function get_list_peoples() {
    $this->people_list = $this->db->queryAll("select * from peoples");
    return $this->people_list;
  }

  function get_man($id) {
    $this->man = $this->db->queryRow("select * from peoples where peopleid=".$id);
    return $this->man;
  }

  function add_man($data) {
    // foreach ($data as $key => $value) {
  	// 	echo "$key - $value<br>";
  	// }
    $q = sprintf("INSERT INTO peoples (lname,fname,mname,birthday,sexid,departmentid,positionid,tab_N) VALUES ('%s','%s','%s','%s',%d,%d,%d,'%s')",
      $this->db->clean($data[lname]),
      $this->db->clean($data[fname]),
      $this->db->clean($data[mname]),
      $this->db->clean($data[bday] ? $data[bday] : ''),
      $this->db->clean($data[sex]),
      $this->db->clean($data[department]),
      $this->db->clean($data[position]),
      $this->db->clean($data[tabN] ? $data[tabN] : '')
    );
    // echo $q;
    $this->db->query($q);
  }

  function update_man($id, $data) {

  }

  function del_man($id) {

  }
}

?>
