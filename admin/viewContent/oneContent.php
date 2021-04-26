<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
$id = $_GET['id'] ?? 1;
$content = $dataContent->getOneContent($id);

include $_SERVER['DOCUMENT_ROOT'] . '/admin/viewContent/oneContent.view.php';