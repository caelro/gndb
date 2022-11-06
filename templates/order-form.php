<script>
	$(document)(() => {
		showDepartment(0);
	});

	function showDepartment(department) {
		$('#employee option').hide();
		$('#employee').prop('selectedIndex', 0);
		$(`#employee option[otdel=${department}]`).show();
	}
</script>

<h3><?= ($id ?? 0) ? 'Редактирование' : 'Добавление' ?> приказа</h3>
<form action="" method="post" name="addorder">
	<select name="department" required onchange="showDepartment(this.value)">
		<option disabled selected value="">Отдел</option>
		<?= $this->getSelectOptions('departments', 'department') ?>
	</select><br />
	<select name="employee" id="employee" required>
		<option disabled selected value="">Ф.И.О.</option>
		<?= $this->getSelectOptions('employees', 'fullname', 0, ['otdel' => 'departmentid']) ?>
	</select><br />
	<select name="type" required>
		<option disabled selected value="">тип события</option>
		<?= $this->getSelectOptions('all_types', 'type') ?>
	</select><br />
	Дата начала:<br />
	<input type="date" name="bdate" required><br />
	Дата окончания:<br />
	<input type="date" name="edate"><br />
	<!-- <input type="checkbox" name="plan" value="1" />План<br /> -->
	<input type="text" name="num" placeholder="Номер приказа"><br />
	<input type="text" name="obj" placeholder="Объект"><br />
	<!-- <select name="obj">
		<option disabled selected value="">направление</option>
		{OPTIONS_OBJ}
	</select><br /> -->
	<input type="checkbox" name="SZsend" value="1" />Служебное задание отправлено в администрацию<br />
	<input type="checkbox" name="AOsend" value="1" />Авансовый отчет передан в администрацию<br />
	<input type="checkbox" name="AOreceive" value="1" />Авансовый отчет принят к исполнению<br />
	<select name="auto">
		<option disabled selected value="">автомобиль (выбирается для водителя)</option>
		{OPTIONS_AUTO}
	</select><br />
	<input type="submit" name="updateorder" value="Отправить">
</form>
