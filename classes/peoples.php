<?php
// require_once(DOCROOT . 'classes' . DIRECTORY_SEPARATOR . 'sqlite.php');

class peoples {
  // private $peopleid;
  private $db;
  public $man = array();

  function __construct() {
    $this->db = new sqlite('db.sqlite');
  }

  function get_people($id) {
    $this->man = $this->db->queryRow('select * from peoples where peopleid='.$id);
    echo $this->man['peopleid'] . ' - ' . $this->man['lname'] . ' ' . $this->man['fname'];
  }

  function get_list_peoples() {

  }
}

?>
