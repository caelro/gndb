<script>
	$( document ).ready(function() {
		showDepartment(0);
	});
	
	function showDepartment(department) {
		$("#people option").hide();
		$("#people").prop('selectedIndex',0);
		$("#people option[otdel=" + department + "]").show();
	}
</script>

<form action="" method="post" id="addmission" name="addmission">
	<select name="department" id="department" required onchange="showDepartment(this.value)">
		<option disabled selected value="">Отдел</option>
		{OPTIONS_DEPARTMENTS}
	</select><br />
	<select name="people" id="people" required>
		<option disabled selected value="">Ф.И.О.</option>
		{OPTIONS_PEOPLES}
	</select><br />
	<select name="type" id="type" required>
		<option disabled selected value="">тип события</option>
		{OPTIONS_TYPES}
	</select><br />
	Дата начала:<br />
	<input type="date" name="bdate" required><br />
	Дата окончания:<br />
	<input type="date" name="edate" required><br />
	<select name="view" required>
		<option disabled selected value="">вид события</option>
		{OPTIONS_VIEW}
	</select><br />
	<input type="text" name="num" placeholder="Номер приказа"><br />
	<select name="obj">
		<option disabled selected value="">направление</option>
		{OPTIONS_OBJ}
	</select>&nbsp;<a href="/">редактировать</a><br />
	<select name="auto">
		<option disabled selected value="">автомобиль (выбирается для водителя)</option>
		{OPTIONS_AUTO}
	</select><br />
	<input type="submit" name="addmission" value="Отправить">
</form>
