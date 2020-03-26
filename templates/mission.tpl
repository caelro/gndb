<script>
	$( document ).ready(function() {
		// $("#people option").hide();
		showDepartment(0);
	});
	function showDepartment(department) {
		$("#people option").hide();
		$("#people").removeClass('active').prop('selectedIndex',0);
		$("#people option[otdel=" + department + "]").show();
	}
	function selectDepartment() {
		$("#people").addClass('active');
	}
	function changeActive() {
		$("select").addClass('active').prop("id","type");
	}
</script>

<form action="/" method="post" id="addmission" name="addmission">
	<select name="department" id="department" onchange="showDepartment(this.value); this.style.color='black'">
		<option disabled selected hidden>Отдел</option>
		{OPTIONS_DEPARTMENTS}
	</select><br />
	<select name="people" id="people" onchange="selectDepartment()">
		<option disabled selected hidden>Ф.И.О.</option>
		{OPTIONS_PEOPLES}
	</select><br />
	<select name="type" id="type" onchange="changeActive()">
		<option disabled selected hidden>тип миссии</option>
		{OPTIONS_TYPES}
		<!-- <option value="K">К</option> -->
		<!-- <option value="RK">РК</option> -->
	</select><br />
	День начала:<br />
	<input type="date" name="bdate" value="2020-04-01"><br />
	День окончания:<br />
	<input type="date" name="edate" value="2020-04-18"><br />
	<select name="obj">
		<option disabled selected hidden>объект</option>
		<option value="gda">ГДА</option>
		<option value="gtv">ГТВ</option>
	</select><br />
	<input type="submit" name="addpeople" value="Отправить">
</form>
