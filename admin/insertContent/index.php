<?php
include $_SERVER["DOCUMENT_ROOT"] . '/bootstrap.php';
$DevEnvs=$dataContent->getAllDevEnv();
session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/admin/insertContent/insertContent.view.php';