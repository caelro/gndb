<div><a href="/peoples">Сотрудники</a> <a href="/addpeople">(добавить)</a></div>
<div><a href="/missions">Приказы</a> <a href="/addmission">(добавить)</a></div>
<hr>
<div class="centered">ОТЧЕТ
	<form action="/" method="post">
		<select name="dep" required>
			<option disabled="" selected="" hidden="" value="">Отдел</option>
			{OPTIONS_DEPARTMENTS}
		</select>
		<select name="per" required>
			<option value="" selected="" disabled="" hidden="">Выберите период</option>
			<option value="val1">Текущая неделя</option>
			<option value="val2">Текущий месяц</option>
			<option value="val3">Следующий месяц</option>
			<option value="val4">Текущее полугодие</option>
			<option value="val5">Текущий год</option>
		</select>
		<input type="date" name="begdat">
		<input type="date" name="enddat">
		<input type="submit" name="report" value="Отправить">
	</form>
</div>