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
    public function insertDevEnv($data)
    {
        $stmt=$this->pdo->prepare("INSERT INTO dev_environments(dev_environment) VALUE (:dev_environment)");
        $stmt->execute([
            'dev_environment'=>$data['dev_environment'],
        ]);
        return $this->pdo->lastInsertId();
    }
    public function insertContent($data)
    {
        $stmt=$this->pdo->prepare("INSERT INTO contents(title,text,created_at,type,program_id,user_id,file) 
                                        VALUES (:title,:text,:create_at,:type,:program_id,:user_id,:file)");
        $stmt->execute([
            'title'=>$data['title'],
            'text'=>$data['text'],
            'created_at'=>date('y-m-d'),
            'type'=>$data['type'],
            'program_id'=>$data['program_id'],
            'user_id'=>$data['user_id'],
            'file'=>$data['file']
        ]);
        return $this->pdo->lastInsertId();
    }
    public function insertImages($data)
    {
        $stmt=$this->pdo->prepare("INSERT INTO images(image,contents_id)
                                         VALUES (:image,:contents_id)");
        $stmt->execute([
            'image'=>$data['image'],
            'contents_id'=>$data['contents_id'],
        ]);
        return $this->pdo->lastInsertId();
    }
    public function getAllDevEnv()
    {
        $stmt=$this->pdo->query("SELECT * FROM dev_environments ORDER BY id ASC");
        return $stmt->fetchAll();
    }
}