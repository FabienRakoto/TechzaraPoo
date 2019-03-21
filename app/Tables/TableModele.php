<?php

namespace App\Tables;

use App\App;

class TableModele
{
    protected static $table;

    private static function getTable()
    {
        if (static::$table === null) {
            $class_name = explode('\\', \get_called_class());
            static::$table = strtolower(end($class_name));
        } else {
            return static::$table;
        }
    }

    public static function all()
    {
        static::getTable();

        return App::getDatabase()->query('SELECT  *  FROM '.static::getTable().'', get_called_class());
    }

    public static function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return App::getDatabase()->prepare($statement, $attributes, get_called_class(), $one);
        } else {
            return App::getDatabase()->query($statement, get_called_class(), $one);
        }
    }

    public static function find($id)
    {
        static::getTable();

        return App::getDatabase()->prepare('SELECT  * FROM '.static::getTable().' WHERE id = ? ', [$id], get_called_class(), true);
    }

    public function __get($key)
    {
        $methode = 'get'.ucfirst($key);
        $this->$key = $this->$methode();

        return $this->$key;
    }
}
