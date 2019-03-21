<?php

namespace App;

class App
{
    const DB_NAME = 'blog';
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    private static $database;
    private static $title = 'Blog';

    public static function getDatabase()
    {
        if (self::$database === null) {
            self::$database = new Database(self::DB_NAME, self::DB_HOST, self::DB_USER, self::DB_PASSWORD);
        }

        return self::$database;
    }

    public static function notFound()
    {
        header('HTTP/1.0 Not Found');
        header('location:index.php?page=404');
    }

    public static function getTitle()
    {
        return self::$title;
    }

    public static function setTitle($title)
    {
        self::$title = $title.' | '.self::$title;
    }
}
