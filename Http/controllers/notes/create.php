<?php
$errors = []; 

/*
	if (! Validator::email('hkjgfcgk')){
		dd('This is not a valid email address');
	}
*/

view("notes/create.view.php", [
	'heading' => 'Create Note',
	'errors' => [],
]);