<?php
use \Core\Response;

function dd($value){						 //USEFUL FOR INSPECTION OF A PARTICULAR VARIABLE
	echo "<pre>";
	var_dump($value);
	echo "</pre>";
	die(); 
}

function urlIs($value){
	return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN){
	if (!$condition){
		abort($status);
	}
}

function base_path($path){
	return BASE_PATH.$path;
}

function view($path, $attributes = [])
{
	extract($attributes); //php fn tht converts the keys into variables and assigns the value corresponding to tht key in an associative array

	require base_path('views/' . $path); // /views/index.view,php
}

//extract() -> It accepts an array and it turns that array into a set of variables where the name of the variable is the key and the value of the variable is the value associated with the key.