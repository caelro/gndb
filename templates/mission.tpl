<form action="/" method="post" name="addmission">
	<select name="department" onselect="enpeople()">
		<option disabled selected>Отдел</option>
		{LIST_DEPARTMENTS}
	</select><br />
	<select name="people" disabled>
		<option disabled selected>Ф.И.О.</option>
		{LIST_PEOPLES}
		<!-- <option value="id4">Цыбулин Александр Владимирович</option> -->
		<!-- <option value="id1">Попов Алексей Борисович</option> -->
	</select><br />
	<select name="type">
		<option disabled selected>тип миссии</option>
		<!-- {LIST_TYPES} -->
		<option value="K">К</option>
		<option value="RK">РК</option>
	</select><br />
	День начала:<br />
	<input type="date" name="bdate" value="2020-04-01"><br />
	День окончания:<br />
	<input type="date" name="edate" value="2020-04-18"><br />
	<select name="obj">
		<option disabled selected>объект</option>
		<option value="gda">ГДА</option>
		<option value="gtv">ГТВ</option>
	</select><br />
	<input type="submit" name="addpeople" value="Отправить">
</form>

<script type="text/javascript">
	function enpeople() {
		if (document.addmission.department.selectedIndex > 0)
			document.addmission.people.disabled = 0;
		else
			document.addmission.people.disabled = 1;
	}
</script>
