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
        $stmt=$this->pdo->query("SELECT contents.*,users.nickname FROM contents
                                        INNER JOIN users ON contents.user_id=users.id
                                        ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }
    public function getOneContent($id)
    {
        $stmt=$this->pdo->prepare("SELECT * FROM contents WHERE id = :id");
        $stmt->execute([
            'id'=>$id
        ]);
        return $stmt->fetch();
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
                                        VALUES (:title,:text,:created_at,:type,:program_id,:user_id,:file)");
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

    public function updateContent($data)
    {
        $stmt=$this->pdo->prepare("UPDATE contents SET title=:title,text=:text,created_at=:created_at,type=:type,
                                            program_id=:program_id,user_id=:user_id,file=:file WHERE id=:id");
        $stmt->execute([
            'title'=>$data['title'],
            'text'=>$data['text'],
            'created_at'=>date('y-m-d'),
            'type'=>$data['type'],
            'program_id'=>$data['program_id'],
            'user_id'=>$data['user_id'],
            'file'=>$data['file'],
            'id'=>$data['id']
        ]);
    }

    public function insertImages($images,$id)
    {
        $stmt = $this->pdo->prepare("INSERT INTO images(image,contents_id)
                                         VALUES (:image,:contents_id)");
        if (!empty($images)) {
            foreach ($images as $img) {
                $stmt->execute([
                    'image' => $img,
                    'contents_id' => $id,
                ]);
            }
        }
        return $this->pdo->lastInsertId();
    }

    public function deleteContent($id)
    {
         $stmt=$this->pdo->prepare("DELETE FROM contents WHERE id=:id");
         $stmt->execute([
             'id'=> $id
         ]);
    }

    public function getAllDevEnv()
    {
        $stmt=$this->pdo->query("SELECT * FROM dev_environments ORDER BY id ASC");
        return $stmt->fetchAll();
    }

    public function getAllImagesFromContent($contents_id){
        $stmt=$this->pdo->prepare("SELECT * FROM images WHERE contents_id=:contents_id");
        $stmt->execute([
            'contents_id'=>$contents_id
        ]);
        return $stmt->fetchAll();
    }
    public function getOneImageFromContent($contents_id){
        $stmt=$this->pdo->prepare("SELECT * FROM images WHERE contents_id=:contents_id");
        $stmt->execute([
            'contents_id'=>$contents_id
        ]);
        return $stmt->fetch();
    }
}