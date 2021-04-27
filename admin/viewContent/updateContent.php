<?php
session_start();

use App\models\Validator;
include $_SERVER['DOCUMENT_ROOT']. '/bootstrap.php';
if (isset($_POST['submitUpdate'])){
    unset($_SESSION['errors']);

    $data['title'] = htmlspecialchars($_POST['title']);
    $data['text'] = ($_POST['text']);
    $data['type'] = htmlspecialchars($_POST['type']);
    $data['program_id'] = htmlspecialchars($_POST['program_id']);
    $data['user_id']=$user->id;
    $data['id'] = $_POST['id'];

    $content=$dataContent->getOneContent($data['id']);

    deleteFile('../../files/'.$content->file);
    deleteSomeImage($allImages,'../../img/');
    [$error,$fileName] =
        loadFile($maxFileContentSize,$validFileContentTypes,$uploadPathContent,'file');
    [$errors,$fileNames]=
        loadSomeImage($maxFileSize,$validFileTypes,$uploadPath,'image');
    $data['file']=$fileName;
    $dataContent->insertImages($fileNames,$data['id']);
    $dataContent->updateContent($data);
    header('Location:/admin/viewContent/oneContent.php?id='.$data['id']);
}