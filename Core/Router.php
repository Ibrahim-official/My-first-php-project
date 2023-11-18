<?php
namespace Core;

class Router {
	protected $routes = [];

	public function get($uri, $controller)
	{
		$this->routes[] = [
			'uri' => $uri,
			'controller' => $controller,
			'method' => 'GET'
		];
	}

	public function post($uri, $controller)
	{
		$this->routes[] = [
			'uri' => $uri,
			'controller' => $controller,
			'method' => 'POST'
		];
	}

	public function delete($uri, $controller)
	{
		$this->routes[] = [
			'uri' => $uri,
			'controller' => $controller,
			'method' => 'DELETE'
		];
	}

	public function patch($uri, $controller)
	{
		$this->routes[] = [
			'uri' => $uri,
			'controller' => $controller,
			'method' => 'PATCH'
		];
	}

	public function put($uri, $controller)
	{
		$this->routes[] = [
			'uri' => $uri,
			'controller' => $controller,
			'method' => 'PUT'
		];
	}

	public function route($uri, $method)
	{
		foreach ($this->routes as $route){
			if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
				// dd($route);
				return require base_path($route['controller']);
			}
		}
		$this->abort();
	}
	protected function abort($code = 404){                                  //fn to abort with the given status code
	http_response_code($code); 
	require base_path("views/{$code}.php");									//requiring VIEWS
																			//Double-quotation for template string(string with variable in it)
	die(); 
	}
}