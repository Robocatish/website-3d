<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>3ds-website</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="header">
    <div class="sub-header">
        <a class="account" href="#"
           style="display: <?= $user ? 'inline': 'none'?>">
            <?=$user ? $user->nickname: '' ?></a>
        <a href="/register" class="account"
           style="display: <?=$user ? 'none':'inline'?>"> Регистрация</a>
        <a href="/auth" class="account">
            <?= $user ? 'Выйти' : "Авторизация"?>
        </a>
    </div>
</div>