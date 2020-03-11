<div><a href="#">Сотрудники</a> <a href="#">(добавить)</a></div>
<div><a href="#">Приказы</a> <a href="#">(добавить)</a></div>
<hr>
<div class="centered">ОТЧЕТ
	<form action="index.php" method="post">
		<select class="wid" name="dep">
			<option selected disabled>Выберите отдел</option>
			<option value="val1">Отедл по контролю за эффективным</option>
			<option value="val2">val2</option>
			<option value="val3">val3</option>
		</select>
		<select class="wid" name="per">
			<option selected disabled>Выберите период</option>
			<option value="val1">Текущая неделя</option>
			<option value="val2">Текущий месяц</option>
			<option value="val3">Следующий месяц</option>
			<option value="val4">Текущее полугодие</option>
			<option value="val5">Текущий год</option>
		</select>
		<input type="date">
		<input type="submit" value="Отправить">
	</form>
</div>