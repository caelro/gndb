<?php

// initialize
$db = getDB();

// create the database structure
$query = "
	CREATE TABLE IF NOT EXISTS foobar (
		id INTEGER PRIMARY KEY AUTOINCREMENT,
		name TEXT
	)
";
$db->exec($query);

// insert some data to the database
$sql ='
	INSERT INTO foobar VALUES
		(1, "LOLOLOL"),
		(2, "Lorem Ipsum....")
';
$db->exec($sql);

return;
//todo: дальше сам исправишь
// лучше всё же использовать prepared statements с параметрами, а не стряпать запросы напрямую.
// иногда так может быть и быстрее, но лучше делать это на более высоком уровне

// query example, multiple rows
$users = $db->queryAll("SELECT * FROM foobar");

// query example, one row
$search = 'Lorem Ipsum....';
$user_info = $db->queryRow(sprintf("SELECT * FROM foobar WHERE name = '%s'", $db->clean($search)));

// query example, one result
$total_users = $db->queryOne("SELECT COUNT(*) FROM foobar");

// insert query
$insert = array(
    'id' => 3,
    'text' => 'Testing'
);
$db->query(sprintf("INSERT INTO foobar VALUES ( %s, '%s' )", $db->clean($insert['id']), $db->clean($insert['text'])));
