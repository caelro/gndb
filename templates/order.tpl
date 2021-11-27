<script>
	$( document ).ready(function() {
		showDepartment(0);
	});

	function showDepartment(department) {
		$("#people option").hide();
		$("#people").prop("selectedIndex",0);
		$("#people option[otdel=" + department + "]").show();
	}
</script>

<form action="" method="post" name="addorder">
	<select name="department" required onchange="showDepartment(this.value)">
		<option disabled selected value="">Отдел</option>
		<?=$options_departments;?>
	</select><br />
	<select name="people" id="people" required>
		<option disabled selected value="">Ф.И.О.</option>
		<?=$options_peoples;?>
	</select><br />
	<select name="type" required>
		<option disabled selected value="">тип события</option>
		<?=$options_types;?>
	</select><br />
	Дата начала:<br />
	<input type="date" name="bdate" required><br />
	Дата окончания:<br />
	<input type="date" name="edate"><br />
	<!-- <input type="checkbox" name="plan" value="1" />План<br /> -->
	<input type="text" name="num" placeholder="Номер приказа"><br />
	<input type="text" name="obj" placeholder="Объект" style="width: 500px;"><br />
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
