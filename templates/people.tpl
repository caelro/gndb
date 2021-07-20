<script>
//	$( document ).ready(function() {
//		document.getElementById('lname').value = "Tsybulin";
//		$('#fname').val('Alexander');
//	});
</script>

<form action="" method="post">
	<input type="text" id="lname" name="lname" placeholder="Фамилия" required {VAL_LNAME}><br />
	<input type="text" id="fname" name="fname" placeholder="Имя" required {VAL_FNAME}><br />
	<input type="text" id="mname" name="mname" placeholder="Отчество" required {VAL_MNAME}><br />
	<select name="sex" required>
		<option disabled selected value="">Пол</option>
		<option {VAL_SEX_1} value="1">Мужской</option>
		<option {VAL_SEX_2} value="2">Женский</option>
	</select><br />
	День рождения:<br />
	<input type="date" name="bday" {VAL_BDAY}><br />
	<input type="text" name="tabN" placeholder="Табельный номер" {VAL_TABN}><br />
	<select name="department" id="department" required>
		<option disabled selected value="">Отдел</option>
		{OPTIONS_DEPARTMENTS}
	</select><br />
	<select name="positions" id="positions" required>
		<option disabled selected value="">Должность</option>
		{OPTIONS_POSITIONS}
	</select><br />
	<input type="submit" name="addpeople" value="Добавить сотрудника" {HIDDEN_1}>
	<input type="submit" name="updatepeople" value="Редактировать сотрудника" {HIDDEN_2}>
</form>