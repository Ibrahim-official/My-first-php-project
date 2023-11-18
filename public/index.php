<?php
const BASE_PATH = __DIR__.'/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
	// Core\Database
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	require base_path($class . '.php');		// ("Core/{$class}.php');
}); 

$router = new \Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];  //Parsing of the URI

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
//I wanna use ths $_POST['_method'] if its set and not null otherwise(??) ths $_SERVER['REQUEST_METHOD']
//$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);