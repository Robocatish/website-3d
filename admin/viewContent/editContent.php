<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']. '/bootstrap.php';
$id= $_GET['id'] ?? 1;
$content=$dataContent->getOneContent($id);
$DevEnvs=$dataContent->getAllDevEnv();
$allImages=$dataContent->getAllImagesFromContent($id);

include $_SERVER['DOCUMENT_ROOT']. '/admin/viewContent/editContent.view.php';