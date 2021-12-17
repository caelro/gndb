<?php

class orders {
  private $db;
  public $order = array();

  function __construct() {
    $this->db = new PDO("sqlite:db.sqlite");
  }

  function get_list_orders() {
    $st = $this->db->query("SELECT * FROM all_orders_2021");
    return $st->fetchAll();
  }

  function show_orders() {
  	$res = "<tr><th>#</th><th>Ф.И.О.</th><th>Отдел</th><th>Тип</th><th>Период</th><th>Действие</th></tr>";
  	$num = 1;
  	foreach ($this->get_list_orders() as $val) {
  		$res .= "<tr>" .
  		"<td>$num</td>" .
  		"<td>$val[fullname]</td>" .
  		"<td>$val[department]</td>" .
  		"<td>$val[type]</td>" .
  		"<td> с " . date("d.m.Y", strtotime($val["bdate"])) . " по " . ($val["edate"] != "" ? date("d.m.Y", strtotime($val["edate"])) : "Н.В.") . "</td>" .
  		"<td><a href=\"/order/edit/$val[id]\">редактировать</a> <a href=\"/order/del/$val[id]\">удалить</a></td>" .
  		"</tr>";
  		$num++;
  	}
  	$res = "<table class=\"table_blur\">$res</table>";
  	return $res;
  }
}
?>
