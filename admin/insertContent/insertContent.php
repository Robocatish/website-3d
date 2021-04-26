<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]. "/bootstrap.php";

if(isset($_POST['submit'])&& $user){
    $data['title']=htmlspecialchars($_POST['title']);
    $data['text']=htmlspecialchars($_POST['text']);
    $data['type']=htmlspecialchars($_POST['type']);
    $data['program_id']=htmlspecialchars($_POST['program_id']);
    $data['user_id']=$user->id;
    [$error,$fileName] =
        loadFile($maxFileContentSize,$validFileContentTypes,$uploadPathContent,'file');
    [$errors,$fileNames]=
        loadSomeImage($maxFileSize,$validFileTypes,$uploadPath,'image');
    if(empty($error)){
        $_SESSION['msg']='Файл успешно загружен';
        $_SESSION['alert']='alert-success';
        $data['file']=$fileName;
    } else {
        $_SESSION['msg']=$error;
        $_SESSION['alert']='alert-danger';
    }
    if(empty($errors)){
        $_SESSION['msg']='Файлы успешно загружены...';
        $_SESSION['alert']='alert-success';
        $dataContent->insertImages($fileNames,$dataContent->insertContent($data));
        header("Location:/admin");
    }else{
        $_SESSION['msg']=implode(', ', $errors);
        $_SESSION['alert']='alert-danger';
        header("Location:/admin/insertContent");
    }
}