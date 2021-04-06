<?php
include $_SERVER["DOCUMENT_ROOT"]. '/bootstrap.php';

if(isset($_POST['submit']))
{
    $email=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars($_POST['password']);
    $user= $dataAuth->auth($email,$password);
    if($user){
        $_SESSION['user'] = json_encode($user,JSON_UNESCAPED_UNICODE);
        $_SESSION['auth'] = true;
        if($user['id']=1){
            header('Location: /admin');
        }else{
            header('Location: /');
        }
    }else{
        $_SESSION['errors']['auth']="неправильно введен логин и пароль...";
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        header('Location: /auth');
    }
}