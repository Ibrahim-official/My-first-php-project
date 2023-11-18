<?php
use Core\Database;

$config =  require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD']=== 'POST'){
	$note = $db->query('SELECT * FROM `notes` WHERE id = :id', ['id' => $_GET['id']	])->findOrFail();

	$condition = $note['User_id'] === $currentUserId;
	authorize($condition);

	$db->query('delete from notes where id = :id', [
		'id' => $_GET['id']
	]);
	header('location: /notes');
	exit();
}
else
	{
	$note = $db->query('SELECT * FROM `notes` WHERE id = :id', ['id' => $_GET['id']	])->findOrFail();

	$condition = $note['User_id'] === $currentUserId;
	authorize($condition);

	view("notes/show.view.php", [
		'heading' => 'Note',
		'note' => $note
	]);
	}