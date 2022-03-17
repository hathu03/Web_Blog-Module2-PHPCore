<?php

class DBConnect
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=demo-mvc-full;charset=utf8";
        $this->username = "root";
        $this->password = "";
    }

    public function connect()
    {
        try {
            $conn = new PDO($this->dsn, $this->username, $this->password);
            return $conn;
        }catch (PDOException $e) {
            exit($e->getMessage());
        }

    }
}