<?php

namespace Core;

class App{
    protected static $container;

    public static function setContainer($container) //static fn can be called anywhere without the need to first instantiate the object of that class
    {
        static::$container = $container;
    }
    
    public static function getContainer()
    {
        return static::$container;
    }

    public static function bind($key,$resolver)
    {
        static::getContainer()->bind($key, $resolver);
    }

    public static function resolve($key)
    {
        return static::getContainer()->resolve($key);
    }
}