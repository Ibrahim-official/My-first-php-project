<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;                          // Create a login form

if ($form->validate($email, $password)){        // Try to validate the credentials

    $auth = new Authenticator();                // If true,

    if ($auth->attempt($email, $password)){     // attempt to authenticate the user
        redirect('/');                          // If true, redirect and die
    }                                           // otherwise update error list
    $form->error('password', 'No matching account found for that email address and password.');
} 

Session::flash('errors', $form->errors());

return redirect('/login');


// return view('session/create.view.php', [        // return to the login page
//     'errors' => $form->errors()
// ]);