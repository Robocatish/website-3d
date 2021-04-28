<?php


namespace App\models;
use PDO;

class Comments
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function commentsForOneContent($id)
    {

    }
}