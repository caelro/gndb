<script>
//	$( document ).ready(function() {
//		document.getElementById("lname").value = "Tsybulin";
//		$("#fname").val("Alexander");
//	});
</script>
<h3><?= ($id ?? 0) ? 'Редактирование' : 'Добавление' ?> сотрудника</h3>
<form action="" method="post">
	<input type="hidden" name="id" value="<?=$id ?? ''?>">
	Фамилия:<br />
	<input type="text" name="lname" placeholder="Фамилия" required value="<?=$lname ?? ''?>"><br />
	Имя:<br />
	<input type="text" name="fname" placeholder="Имя" required value="<?=$fname ?? ''?>"><br />
	Отчество:<br />
	<input type="text" name="mname" placeholder="Отчество" required value="<?=$mname ?? ''?>"><br />
	Пол:<br />
	<select name="sexid" required>
		<option disabled selected value="">Пол</option>
		<?=$sexid?>
	</select><br />
	День рождения:<br />
	<input type="date" name="birthday" value="<?=$birthday ?? ''?>"><br />
	Отдел:<br />
	<select name="departmentid" required>
		<option disabled selected value="">Отдел</option>
		<?=$departmentid?>
	</select><br />
	Должность:<br />
	<select name="positionid" required>
		<option disabled selected value="">Должность</option>
		<?=$positionid?>
	</select><br />
	Табельный номер:<br />
	<input type="text" name="tab_n" placeholder="Табельный номер" value="<?=$tab_n ?? ''?>"><br />
	Дата назначения:<br />
	<input type="date" name="orderdate" value="<?=$orderdate ?? ''?>"><br />
	<input type="submit" value="Сохранить">
</form>
