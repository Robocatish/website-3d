<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]. "/bootstrap.php";

if (isset($_POST['submit']))
{
    $data['title']=htmlspecialchars($_POST['title']);
    $data['info']=($_POST['info']);
    $data['user_id']=$user->id;
    [$error,$fileName] =
        loadImg($maxFileSize,$validFileTypes,$uploadPathGallery,'image');
    if(empty($error)){
        $_SESSION['msg']='Файл успешно загружен';
        $_SESSION['alert']='alert-success';
        $data['image']=$fileName;
        $dataGallery->insertGallery($data);
        header('Location:/admin');
    } else {
        $_SESSION['msg']=$error;
        $_SESSION['alert']='alert-danger';
        header('Location:/admin/insertGallery');
    }
}