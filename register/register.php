<?php
use App\models\Validator;
include $_SERVER['DOCUMENT_ROOT']. '/bootstrap.php';

if (isset($_POST['submit'])){
    unset($_SESSION['errors']['register']);
    $nickname = Validator::preProcessing($_POST['nickname']);
    $email = Validator::preProcessing($_POST['email']);
    $password = Validator::preProcessing($_POST['password']);
    if (Validator::validLength('никнейм',$nickname, 'nickname', 2) &
        Validator::validLength('email',$email,'email') &
        Validator::validLength('Пароль',$password,'password') &
        Validator::validEmail('email',$email,'email')
    ){
        $id=$dataAuth->register($nickname,$email,$password);
        if ($id == -1){
            $_SESSION['errors']['register'] = 'Пользователь с такими данными уже зарегестрирован в системе...';
        }else if ($id > 0){
            $_SESSION['user'] = json_encode($dataAuth->find($id), JSON_UNESCAPED_UNICODE);
            $_SESSION['auth'] = true;
            header('Location: /');
            die();
        } else {
            $_SESSION['errors']['register'] = 'Попытка зарегистрироваться в системе закончилась неудачей...';
        }
    }
    $_SESSION['nickname'] = $nickname;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    header('Location: /register');
}