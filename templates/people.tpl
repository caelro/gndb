<script>
//	$( document ).ready(function() {
//		document.getElementById('lname').value = 'Tsybulin';
//		$('#fname').val('Alexander');
//	});
</script>

<form action='' method='post'>
	<input type='text' id='lname' name='lname' placeholder='Фамилия' required value='<?=$val_lname;?>'><br />
	<input type='text' id='fname' name='fname' placeholder='Имя' required value='<?=$val_fname;?>'><br />
	<input type='text' id='mname' name='mname' placeholder='Отчество' required value='<?=$val_mname;?>'><br />
	<select name='sex' required>
		<option disabled selected value=''>Пол</option>
		<?=$options_sex;?>
	</select><br />
	День рождения:<br />
	<input type='date' name='bday' value='<?=$val_bday;?>'><br />
	<input type='text' name='tabN' placeholder='Табельный номер' value='<?=$val_tabn;?>'><br />
	<select name='department' id='department' required>
		<option disabled selected value=''>Отдел</option>
		<?=$options_departments;?>
	</select><br />
	<select name='positions' id='positions' required>
		<option disabled selected value=''>Должность</option>
		<?=$options_positions;?>
	</select><br />
	<!-- <input type='submit' name='addpeople' value='Добавить сотрудника' {HIDDEN_1}> -->
	<input type='submit' name='updatepeople' value='Добавить / редактировать сотрудника'>
</form>
