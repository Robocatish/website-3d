<?php


namespace App\models;
use PDO;


class Gallery
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function getAllGallery()
    {
        $stmt=$this->pdo->query("SELECT gallery.*,users.nickname FROM gallery
                                INNER JOIN users ON gallery.user_id=users.id
                                ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public function getOneImage($id)
    {
        $stmt=$this->pdo->prepare("SELECT * FROM gallery WHERE id=:id");
        $stmt->execute([
            'id'=>$id
        ]);
        return $stmt->fetch();
    }

    public function insertGallery($data)
    {
        $stmt=$this->pdo->prepare("INSERT INTO gallery(title,image,info,user_id,created_at)
                                         VALUES (:title,:image,:info,:user_id,:created_at)");
        $stmt->execute([
            'title'=>$data['title'],
            'image'=>$data['image'],
            'info'=>$data['info'],
            'user_id'=>$data['user_id'],
            'created_at'=>date('y-m-d')
        ]);
        return $this->pdo->lastInsertId();
    }
}