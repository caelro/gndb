<form action="" method="post">
	<input type="text" name="lname" placeholder="Фамилия" required><br />
	<input type="text" name="fname" placeholder="Имя"><br />
	<input type="text" name="mname" placeholder="Отчество"><br />
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
</form>