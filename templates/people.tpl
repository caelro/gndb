<script>
//	$( document ).ready(function() {
//		document.getElementById('lname').value = "Tsybulin";
//		$('#fname').val('Alexander');
//	});
</script>

<form action="" method="post">
	<input type="text" id="lname" name="lname" placeholder="Фамилия" required value="{VAL_LNAME}"><br />
	<input type="text" id="fname" name="fname" placeholder="Имя" required value="{VAL_FNAME}"><br />
	<input type="text" id="mname" name="mname" placeholder="Отчество" required value="{VAL_MNAME}"><br />
	<select name="sex" required>
		<option disabled selected value="">Пол</option>
		<option value="1">Мужской</option>
		<option value="2">Женский</option>
	</select><br />
	День рождения:<br />
	<input type="date" name="bday"><br />
	<input type="text" name="tabN" placeholder="Табельный номер"><br />
	<select name="department" id="department" required>
		<option disabled selected value="">Отдел</option>
		{OPTIONS_DEPARTMENTS}
	</select><br />
	<select name="positions" id="positions" required>
		<option disabled selected value="">Должность</option>
		{OPTIONS_POSITIONS}
	</select><br />
	<input type="submit" name="addpeople" value="Добавить сотрудника">
	<input type="submit" name="updatepeople" value="Редактировать сотрудника" hidden>
</form>