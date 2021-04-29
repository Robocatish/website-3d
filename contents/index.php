<?php
include $_SERVER['DOCUMENT_ROOT']. '/bootstrap.php';

$contents=$dataContent->getAllContents();
$Image=$dataContent->getOneImageFromContent($contents_id);
include $_SERVER['DOCUMENT_ROOT']. '/contents/viewContent.view.php';