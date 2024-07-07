<?php
use Core\App;
use Core\Database;

$db = App::getContainer()->resolve(\Core\Database::class);

$currentUserId = 1;

$note = $db->query('SELECT * FROM `notes` WHERE id = :id', ['id' => $_GET['id']	])->findOrFail();

$condition = $note['User_id'] === $currentUserId;
authorize($condition);

view("notes/show.view.php", [
	'heading' => 'Note',
	'note' => $note
]);
