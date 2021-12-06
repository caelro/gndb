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
    // $this->db->query(sprintf("INSERT INTO peoples ('lname') values ('%s')",$this->db->clean($data['lname'])));
    // $this->db->query(sprintf("insert into peoples ('fname') values ('%s')",$this->db->clean($data['fname'])));
    // $this->db->query(sprintf("insert into peoples ('mname') values ('%s')",$this->db->clean($data['mname'])));
    // $this->db->query(sprintf("insert into peoples ('birthday') values ('%s')",$this->db->clean($data['bday'])));
    // $this->db->query(sprintf("insert into peoples ('sexid') values (%d)",$this->db->clean($data['sex'])));
    // $this->db->query(sprintf("insert into peoples ('departmentid') values (%d)",$this->db->clean($data['department'])));
    // $this->db->query(sprintf("insert into peoples ('positionid') values (%d)",$this->db->clean($data['position'])));
    // $this->db->query(sprintf("insert into peoples ('tab_N') values ('%s')",$this->db->clean($data['tabN'])));

    // foreach ($data as $key => $value) {
  	// 	echo "$key - $value<br>";
  	// }
    $q = "INSERT INTO peoples (
      lname,
      fname,
      mname,
      birthday,
      sexid,
      departmentid,
      positionid,
      tab_N
    ) VALUES (
      '$data[lname]',
      '$data[fname]',
      '$data[mname]',
      ". ($data[bday] ? "'$data[bday]'" : 'NULL') .",
      $data[sex],
      $data[department],
      $data[position],
      ". ($data[tabN] ? "'$data[tabN]'" : 'NULL') ."
    )";
    echo $q;
    echo $this->db->query($q);
  }

  function update_man($id, $data) {

  }

  function del_man($id) {

  }
}

?>
