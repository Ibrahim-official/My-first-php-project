<?php
use Core\App;
use Core\Database;
use Core\Validator;

//Find the crossponding note
$db = App::getContainer()->resolve(\Core\Database::class);

$currentUserId = 1;

$note = $db->query('SELECT * FROM `notes` WHERE id = :id', [
    'id' => $_POST['id']	
])->findOrFail();



//authorize that current user can edit the note
authorize($note['User_id'] === $currentUserId);




//validate the form
$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)){
    $errors['body'] = 'A body of no more than 1000 charcters is required';
    }
    


//if no validation errors, update the record in the notes database table
if (count($errors)) {
    return view('notees/edit.view.php',[
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note'=> $note
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);


//redirect the user
header('location: /notes');
die;
