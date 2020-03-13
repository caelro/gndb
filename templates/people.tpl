<form action="index.php" method="post">
	Фамилия:<br />
	<input type="type" name="lname" value="Цыбулин"><br />
	Имя:<br />
	<input type="type" name="fname" value="Александр"><br />
	Отчество:<br />
	<input type="type" name="mname" value="Владимирович"><br />
	Пол:<br />
	<select name="sex">
		<!-- <option selected disabled>Пол</option> -->
		<option value="m">Male</option>
		<option value="f">Female</option>
	</select><br />
	День рождения:<br />
	<input type="date" name="bday" value="1981-04-09"><br />
	Табельный номер:<br />
	<input type="type" name="tabN" value="1234"><br />
	Отдел:<br />
	<select name="dep">
		<option value="oktsgno">ОКТСГНО</option>
		<option value="okskr">ОКСиКР</option>
		<option value="air" selected>АИР</option>
	</select><br />
	Должность:<br />
	<select name="pos">
		<option value="vi" selected>Ведущий инженер</option>
		<option value="nu">Начальник управления</option>
	</select><br />
	<br /><input type="submit" name="send">
</form>