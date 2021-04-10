<?php
namespace App\models;
use PDO;

class Content
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function getAllContents()
    {
        $stmt=$this->pdo->query("SELECT * FROM contents ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }
    public function getOneContent($id)
    {

    }
    public function insertContent($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO contents()")
    }
}