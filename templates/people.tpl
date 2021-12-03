<script>
//	$( document ).ready(function() {
//		document.getElementById("lname").value = "Tsybulin";
//		$("#fname").val("Alexander");
//	});
</script>

<form action="" method="post" name="addpeople">
	<input type="text" name="lname" placeholder="Фамилия" required value="<?=$val_lname;?>"><br />
	<input type="text" name="fname" placeholder="Имя" required value="<?=$val_fname;?>"><br />
	<input type="text" name="mname" placeholder="Отчество" required value="<?=$val_mname;?>"><br />
	<select name="sex" required>
		<option disabled selected value="">Пол</option>
		<?=$options_sex;?>
	</select><br />
	День рождения:<br />
	<input type="date" name="bday" value="<?=$val_bday;?>"><br />
	<input type="text" name="tabN" placeholder="Табельный номер" value="<?=$val_tabn;?>"><br />
	<select name="department" required>
		<option disabled selected value="">Отдел</option>
		<?=$options_departments;?>
	</select><br />
	<select name="position" required>
		<option disabled selected value="">Должность</option>
		<?=$options_positions;?>
	</select><br />
	<input type="submit" name="<?=$name_addpeople;?>" value="<?=$val_addpeople;?>">
</form>
