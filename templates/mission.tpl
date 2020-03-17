<form action="/" method="post">
	<select name="people">
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