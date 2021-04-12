<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]. '/bootstrap.php';

if (isset($_POST['submit'])) {
    $data['dev_environment']=htmlspecialchars($_POST['dev_environment']);
    $dataContent->insertDevEnv($data);
    header('Location: /admin');
}