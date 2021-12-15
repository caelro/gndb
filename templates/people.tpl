<script>
//	$( document ).ready(function() {
//		document.getElementById("lname").value = "Tsybulin";
//		$("#fname").val("Alexander");
//	});
</script>

<form action="" method="post" name="addpeople">
	<input type="hidden" name="id" value="<?=$val_id;?>"><br />
	Фамилия:<br />
	<input type="text" name="lname" placeholder="Фамилия" required value="<?=$val_lname;?>"><br />
	Имя:<br />
	<input type="text" name="fname" placeholder="Имя" required value="<?=$val_fname;?>"><br />
	Отчество:<br />
	<input type="text" name="mname" placeholder="Отчество" required value="<?=$val_mname;?>"><br />
	Пол:<br />
	<select name="sex" required>
		<option disabled selected value="">Пол</option>
		<?=$options_sex;?>
	</select><br />
	День рождения:<br />
	<input type="date" name="bday" value="<?=$val_bday;?>"><br />
	Отдел:<br />
	<select name="department" required>
		<option disabled selected value="">Отдел</option>
		<?=$options_departments;?>
	</select><br />
	Должность:<br />
	<select name="position" required>
		<option disabled selected value="">Должность</option>
		<?=$options_positions;?>
	</select><br />
	Табельный номер:<br />
	<input type="text" name="tabN" placeholder="Табельный номер" value="<?=$val_tabn;?>"><br />
	Дата приказа о назначении:<br />
	<input type="date" name="odate" value="<?=$val_odate;?>"><br />
	<input type="submit" name="<?=$name_addpeople;?>" value="<?=$val_addpeople;?>">
</form>
