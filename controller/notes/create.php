<?php
use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');

$config =  require base_path('config.php');
$db = new Database($config['database']);
$errors = []; 
//Initially,we only declare the errors variable IF the form was submitted.So no matter what there will be an errors variable available 

/*
	if (! Validator::email('hkjgfcgk')){
		dd('This is not a valid email address');
	}
*/

if($_SERVER['REQUEST_METHOD']==='POST'){

	if (! Validator::string($_POST['body'], 1, 1000)){
	$errors['body'] = 'A body of no more than 1000 charcters is required';
	}

	if (empty($errors)){
		$db->query('INSERT INTO notes (body, User_id) VALUES (:body, :User_id)',//Values->wildcards/parameter
		[
			'body' => $_POST['body'],
			'User_id' => 1
		]);
		$okMsg = "New record added";
	}
}

view("notes/create.view.php", [
	'heading' => 'Create Note',
	'errors' => $errors
]);