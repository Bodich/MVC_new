<?php
 class Config
{
    static $confArray;

    public static function read($name)
    {
        return self::$confArray[$name];
    }

    public static function write($name, $value)
    {
        self::$confArray[$name] = $value;
    }

}

// db
Config::write('db.host', 'localhost');
Config::write('db.port', '5432');
Config::write('db.basename', 'test');
Config::write('db.user', 'root');
Config::write('db.password', 'vertrigo');
