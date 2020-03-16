<div><a href="/peoples">Сотрудники</a> <a href="/addpeoples">(добавить)</a></div>
<div><a href="/missions">Приказы</a> <a href="/addmissions">(добавить)</a></div>
<hr>
<div class="centered">ОТЧЕТ
	<form action="/" method="post">
		<select class="wid" name="dep">
			<option disabled>Выберите отдел</option>
			<option selected value="val1">Отдел по контролю за эффективным использованием газа</option>
			<option value="val2">val2</option>
			<option value="val3">val3</option>
		</select>
		<select class="wid" name="per">
			<option disabled>Выберите период</option>
			<option selected value="val1">Текущая неделя</option>
			<option value="val2">Текущий месяц</option>
			<option value="val3">Следующий месяц</option>
			<option value="val4">Текущее полугодие</option>
			<option value="val5">Текущий год</option>
		</select>
		<input type="date" name="begdat" value="2020-03-16">
		<input type="date" name="enddat" value="2020-03-20">
		<input type="submit" name="report" value="Отправить">
	</form>
</div>