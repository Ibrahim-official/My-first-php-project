<?php
namespace Core;

class Validator
{
	public static function string($value, $min = 1, $max = INF)
	{
		$value = trim($value);  
		//Trimming removes any whitespace characters (spaces, tabs, etc.) from the beginning and end of the string.

		return strlen($value) >= $min && strlen($value) <= $max;
		//Finally, the method returns a boolean value (true or false) based on whether the length of the string falls within the specified range ($min to $max) after trimming.
		//To summarize, this static method string() provides a way to validate the length of a string within a specified range after trimming any leading or trailing whitespace. It returns true if the length is within the specified range, and false otherwise.
	}

	public static function email($value)
	{
		return filter_var($value, FILTER_VALIDATE_EMAIL);
	}
}