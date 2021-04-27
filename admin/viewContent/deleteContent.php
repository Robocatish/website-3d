<?php
include $_SERVER['DOCUMENT_ROOT']. '/bootstrap.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $content=$dataContent->getOneContent($id);

    $allImages=$dataContent->getAllImagesFromContent($id);

    deleteFile('../../files/'.$content->file);

    deleteSomeImage($allImages,'../../img/');

    $dataContent->deleteContent($id);

    header('Location: /admin');
}
