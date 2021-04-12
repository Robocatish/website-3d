<?php include $_SERVER["DOCUMENT_ROOT"]. '/templates/header.php';
include $_SERVER['DOCUMENT_ROOT']. '/templates/nav.php'; ?>
<div>
    <p class="alert <?= $_SESSION['alert']?>"><?= $_SESSION['msg'] ?? ''?></p>
    <form action="insertDevEnv.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="dev_environment">Среда разработки</label>
            <input type="text" id="dev_environment" name="dev_environment">
        </div>
        <button type="submit" name="submit">Добавить</button>
    </form>
</div>
