<?php

use Core\App;
use Core\Database;

$db = App::resolve(\Core\Database::class);

$currentUserId = 1;

$note = $db->query('SELECT * FROM `notes` WHERE id = :id', 
    ['id' => $_POST['id']	
    ])->findOrFail();  //Authorization and Authentication tht the id really is urs

$condition = $note['User_id'] === $currentUserId;
authorize($condition);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);
header('location: /notes'); //After deleting the note, ths redirects to the notes page
exit();