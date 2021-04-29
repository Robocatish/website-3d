<?php
include $_SERVER['DOCUMENT_ROOT']. "/bootstrap.php";
$illustrations=$dataGallery->getAllGallery();
include $_SERVER['DOCUMENT_ROOT']. '/templates/header.php';
include $_SERVER['DOCUMENT_ROOT']. '/templates/navDefault.php';
include $_SERVER['DOCUMENT_ROOT']. '/navigationPanel/gallery/index.view.php';
include $_SERVER['DOCUMENT_ROOT']. '/templates/footer.php';