<?php
const BASE_PATH = __DIR__.'/../';

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


$router = new \Core\Router();
/*
	\Core\Router: This is the fully qualified class name (FQCN) of the class being instantiated. In PHP, backslashes (\) are used to denote namespaces. So, \Core\Router refers to the Router class within the Core namespace.This is typically how you instantiate objects in OOP in PHP.

	Next we will require routes.php file and cuz we have already intialized the router object tht will be available within routes.php file*/

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];   //Parsing of the URI of the current request
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
/*
	$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
	I wanna use ths $_POST['_method'] if its set and not null otherwise(??) ths $_SERVER['REQUEST_METHOD']
	All ths part came from the old router I built 
	Purpose of URI parsing line is to extract the path from the URI, which is often used in routing to determine which endpoint or controller should handle the request.*/

$router->route($uri, $method);