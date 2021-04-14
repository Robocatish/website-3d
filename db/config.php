<?php
const CONN = [
    "host"=>"localhost",
    "dbname"=>"model_website",
    "login"=>"root",
    "password"=>"root",
    "options"=>[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ]
];

$maxFileSize = 5*1024*1024;
$validFileTypes = ['image/jpg','image/jpeg','image/png'];
$uploadPath = $_SERVER['DOCUMENT_ROOT'] .'/img/';

$maxFileContentSize = 500*1024*1024;
$validFileContentTypes = [''];
$uploadPathContent = $_SERVER['DOCUMENT_ROOT']. '/files/';