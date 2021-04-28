<?php
include $_SERVER['DOCUMENT_ROOT']. '/bootstrap.php';

$contents=$dataContent->getAllContents();

include $_SERVER['DOCUMENT_ROOT']. '/contents/viewContent.view.php';