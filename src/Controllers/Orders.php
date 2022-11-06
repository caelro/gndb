<?php
namespace Controllers;

use Models\Order;
use Template;

class Orders {
	public function index() {
		return Template::render('orders', ['list' => Order::getList()]);
	}

	public function add() {
		return Template::render('order-form');
		//$content->options_positions=get_options("positions", "position");
		//$content->set_tpl("{OPTIONS_OBJ}", get_optons("objects", array("object", "object")));
		//$content->set_tpl("{OPTIONS_VIEW}", get_optons("views", "view"));
		//$content->set_tpl("{OPTIONS_AUTO}", get_optons("all_autos", array("auto", "auto")));
	}
}
