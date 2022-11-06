<h3>Сотрудники</h3>
<table class="table_blur">
	<tr>
		<th>#</th>
		<th>Ф.И.О.</th>
		<th>Отдел</th>
		<th>Должность</th>
		<th></th>
	</tr>
	<?php foreach ($list as $row): ?>
	<tr>
		<td><?= $id = $row['id'] ?></td>
		<td><a href="/employees/edit/<?= $id ?>"><?= $this->e($row['fullname']) ?></a></td>
		<td><?= $this->e($row['department']) ?></td>
		<td><?= $this->e($row['position']) ?></td>
		<?php
		//todo: навешивать обработчики на каждую строку - плохо, тем более не вызов функции, а прям текст. потом разберёмся
		//todo: и хуже всего, что если жс не работает, то удаление будет без запроса. надо чтобы наоборот удаление работало только если сработал жс
		?>
		<td>
			<a href="/employees/edit/<?= $id ?>"><i class="fa fa-pencil"></i></a>
			<a href="/employees/delete/<?= $id ?>" onclick="return confirm('Точно удалить?')"><i class="far fa-trash-can"></i></a>
		</td>
	</tr>
	<?php endforeach ?>
</table>
