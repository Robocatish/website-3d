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

    public function commentsForOneContent($contents_id)
    {
        $stmt=$this->pdo->prepare("SELECT * FROM comments WHERE contents_id=:contents_id");
        $stmt->execute([
            'contents_id'=>$contents_id
        ]);
        return $stmt->fetchAll();
    }
}