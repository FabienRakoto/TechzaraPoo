<?php

namespace App;

use PDO;

class Database
{
    private $db_name;
    private $db_host;
    private $db_user;
    private $db_password;
    private $pdo;

    public function __construct($db_name, $db_host = '', $db_user = '', $db_password = '')
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
    }

    public function getPDO()
    {
        //Acceuer qui initialise PDO qu'un seul fois

        if ($this->pdo === null) {
            $pdo = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name.'', $this->db_user,$this->db_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    public function query($statment, $className, $one = false)
    {
        $req = $this->getPDO()->query($statment);
        $req->setFetchMode(PDO::FETCH_CLASS, $className);
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }

        return $datas;
    }

    public function prepare($statment, $attribuites, $className, $one)
    {
        $req = $this->getPDO()->prepare($statment);
        $req->execute($attribuites);
        $req->setFetchMode(PDO::FETCH_CLASS, $className);

        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }

        return $datas;
    }
}

