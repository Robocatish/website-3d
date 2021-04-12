<?php

use App\db\Connect;
use App\models\Auth;
use App\models\Content;

include $_SERVER['DOCUMENT_ROOT']. '/db/config.php';
include $_SERVER['DOCUMENT_ROOT']. '/db/Connect.php';
include $_SERVER['DOCUMENT_ROOT']. '/db/functions.php';
include $_SERVER['DOCUMENT_ROOT']. '/models/Content.php';
include $_SERVER['DOCUMENT_ROOT']. '/models/Auth.php';
include $_SERVER['DOCUMENT_ROOT']. '/models/Validator.php';

$user = isset($_SESSION['auth']) && $_SESSION['auth'] ? json_decode($_SESSION['user']): false;

$pdo = Connect::make(CONN);
$dataContent = new Content($pdo);
$dataAuth = new Auth($pdo);