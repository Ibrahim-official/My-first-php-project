<?php

namespace Core;

class ValidationException extends \Exception
{
    public readonly array $errors;          //readonly can only be assigned to once and can never be updated
    public readonly array $old;

    public static function throw($errors, $old)
    {
        $instance = new static;

        $instance->errors = $errors;
        $instance->old = $old;
        
        throw $instance;
    }
}