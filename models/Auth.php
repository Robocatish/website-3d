<?php


namespace App\models;
use PDO;


class Auth
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    }
    public function auth($email,$password){
        $stmt = $this->pdo->prepare()
    }
}