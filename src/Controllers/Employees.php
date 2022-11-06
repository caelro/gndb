<?php
namespace Controllers;

use Models\Employee;
use Template;

class Employees {
	const BaseURL = '/employees';

	public function index() {
		return Template::render('employees', ['list' => Employee::getList()]);
	}

	public function add() {
		if ($_POST) $this->save($_POST);
		return Template::render('employee-form');
	}

	public function edit($id) {
		if ($_POST) $this->save($_POST, $id);
		$row = Employee::getById($id);
		return Template::render('employee-form', $row);
	}

	public function save(array $data, $id = null): never {
		foreach ($data as &$value) {
			if (is_string($value)) $value = trim($value);
		}
		Employee::save($data, $id);
		redirect(self::BaseURL);
	}

	public function delete($id) {
		Employee::delete($id);
		redirect(self::BaseURL);
	}
}
