<?php
include $_SERVER ['DOCUMENT_ROOT']. '/bootstrap.php';
$contents=$dataContent->getAllContents();
include $_SERVER ['DOCUMENT_ROOT']. '/templates/header.php';
include $_SERVER ['DOCUMENT_ROOT']. '/templates/navDefault.php';
include $_SERVER ['DOCUMENT_ROOT']. '/navigationPanel/plugins/index.view.php';
include $_SERVER ['DOCUMENT_ROOT']. '/templates/footer.php';