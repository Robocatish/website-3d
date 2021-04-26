<?php
include $_SERVER['DOCUMENT_ROOT']. '/bootstrap.php';

$contents=$dataContent->getAllContents();

include $_SERVER['DOCUMENT_ROOT']. '/admin/viewContent/viewContent.view.php';