<h3>Приказы</h3>
<table class="table_blur">
	<tr>
		<th>#</th>
		<th>Ф.И.О.</th>
		<th>Отдел</th>
		<th>Тип</th>
		<th>Период</th>
		<th></th>
	</tr>
	<?php foreach ($list as $row): ?>
	<tr>
		<td><?= $id = $row['id'] ?></td>
		<td><?= $this->e($row['fullname']) ?></td>
		<td><?= $this->e($row['department']) ?></td>
		<td><?= $this->e($row['type']) ?></td>
		<td>
			с
			<?= date(DATE_USER, strtotime($row['bdate'])) ?>
			по
			<?= $row['edate'] ? date(DATE_USER, strtotime($row['edate'])) : 'Н.В.' ?>
		</td>
		<td>
			<a href="/orders/edit/<?= $id ?>"><i class="fa fa-pencil"></i></a>
			<a href="/orders/delete/<?= $id ?>"><i class="far fa-trash-can"></i></a>
		</td>
	</tr>
	<?php endforeach ?>
</table>
