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
    $this->db->query(sprintf("insert into peoples ('lname','fname','mname') values ('%s','%s','%s')",$this->db->clean(),$this->db->clean(),$this->db->clean()));
    $this->db->query(sprintf("insert into peoples ('birthday') values ()",));
    $this->db->query(sprintf("insert into peoples ('sexid') values ()",));
    $this->db->query(sprintf("insert into peoples ('departmentid','positionid') values ()",));
    $this->db->query(sprintf("insert into peoples ('tab_N') values ()",));
  }

  function update_man($id, $data) {

  }

  function del_man($id) {

  }
}

?>
