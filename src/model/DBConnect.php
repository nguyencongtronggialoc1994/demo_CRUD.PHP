<?php
namespace App\model;
use PDO;
class DBConnect
{
    public $dsn;
    public $user;
    public $pass;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=my_database1;charset=utf8";
        $this->user = 'root';
        $this->pass = '1234';
    }

    public function connect()
    {
        return new PDO($this->dsn, $this->user, $this->pass);
    }

}