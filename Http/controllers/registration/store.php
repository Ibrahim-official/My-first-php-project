<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);    //grab(resolve) Database class

$email = $_POST['email'];
$password = $_POST['password'];

// validate the input
$errors = [];
if (!Validator::email($email)){
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)){
    $errors['password'] = 'Password must be longer than 7 characters.';
}

if (!empty($errors)){
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}


// check if the account already exists 

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();


if ($user) {
    //then someone with that email already exists and has an account
    // if yes, redirect to login page

    header('location: /');
    exit();
}
else{
    // if not, save it to the database, and then log the user in and redirect
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)',[
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // log the user in
    login([
        'email' => $email
    ]);
    
    header('location: /');
    exit();
}
