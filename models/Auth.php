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
    public function auth($email,$password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute([
            'email' => $email,
        ]);
        $user = $stmt->fetch();
        if ($user){
            if(password_verify($password,$user->password)) {
                return $user;
            }
        }
        return false;
    }
    public function register($nickname,$email,$password)
    {
        if($this->auth($email,$password)){
            return -1;
        }
        $stmt=$this->pdo->prepare("INSERT INTO users (nickname,email,password) VALUES(:nickname,:email,:password)");
        $stmt->execute([
            'nickname'=>$nickname,
            'email'=>$email,
            'password'=>password_hash($password,PASSWORD_DEFAULT),
        ]);
        return $this->pdo->lastInsertId();
    }
}