<?php include $_SERVER["DOCUMENT_ROOT"]. '/templates/header.php';
include $_SERVER['DOCUMENT_ROOT']. '/templates/nav.php'; ?>
<div class="auth">
    <form action="insertDevEnv.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="dev_environment">Среда разработки</label>
            <input type="text" id="dev_environment" name="dev_environment" class="authInput">
        </div>
        <button type="submit" name="submit" class="enterInAccount">Добавить</button>
    </form>
</div>
