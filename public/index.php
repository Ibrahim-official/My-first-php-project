<?php

use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__.'\\..\\';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
	// Core\Database
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	require base_path($class . '.php');		// ("Core/{$class}.php');
	/*
	The idea tht everytime I need access to a new class. I have to require it with an index.php is NOT a good approach-> like ths
	require base_path('Database.php');
	require base_path('Response.php');

	Instead, spl_autoload_register automatically load and require these classes when I instantiate them(make objects of their classes) or whenever I need them.*/
}); 

require base_path('bootstrap.php');

$router = new \Core\Router();
/*
	\Core\Router: This is the fully qualified class name (FQCN) of the class being instantiated. 
	In PHP, backslashes (\) are used to denote namespaces. 
	So, \Core\Router refers to the Router class within the Core namespace.
	This is typically how you instantiate objects in OOP in PHP.

	Next we will require routes.php file and cuz we have already intialized the router object tht 
	will be available within routes.php file*/

$routes = require base_path('routes.php'); //ths will populate the routes[] in Router class

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];   //Figure out the current URI -	Parse it

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try{
	$router->route($uri, $method); //router-class, route-method of tht class

} catch (ValidationException $exception) 
{	
	Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}
Session::unflash();	