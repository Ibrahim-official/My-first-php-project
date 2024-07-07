<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate($email, $password)
    {
        if (!Validator::email($email)){
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($password)){
            $this->errors['password'] = 'Please provide a valid password.';
        }
        return empty($this->errors);
    }


    public function errors()        //getter method for protected $errors[]
    {
        return $this->errors; 
    }

    public function error($field, $message) //setter
    {
        $this->errors[$field] = $message;
    }
}