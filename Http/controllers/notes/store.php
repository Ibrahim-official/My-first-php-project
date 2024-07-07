<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::getContainer()->resolve(\Core\Database::class);

$errors = []; 
$okMsg = "New record added";


if (! Validator::string($_POST['body'], 1, 1000)){
$errors['body'] = 'A body of no more than 1000 charcters is required';
}

if (! empty($errors)){
    // Validation issues
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors,
    ]);
}

$db->query('INSERT INTO notes (body, User_id) VALUES (:body, :User_id)',//Values->wildcards/parameter
[
    'body' => $_POST['body'],
    'User_id' => 1
]);

header('location: /notes');
die();