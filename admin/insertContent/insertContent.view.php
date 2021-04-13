<?php include $_SERVER["DOCUMENT_ROOT"]. '/templates/header.php';
include $_SERVER['DOCUMENT_ROOT']. '/templates/nav.php'; ?>
<div class="auth">
    <form action="insertContent.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="title">Название материала</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="text">Текст/описание материала</label>
            <textarea name="text" id="text" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="type">тип материала</label>
            <select name="type" id="type">
                <option value="lesson">Урок</option>
                <option value="plugin">Плагин</option>
            </select>
        </div>
        <div>
            <label for="DevEnv">рабочая среда</label>
            <select name="program_id" id="program_id">
                <?php foreach ($DevEnvs as $devEnv):?>
                <option value="<?=$devEnv->id?>"><?=$devEnv->dev_environment?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="file">файл (документ/архив с плагином)</label>
            <input type="file" name="file" id="file">
        </div>
        <button type="submit" name="submit">
            Добавить
        </button>
    </form>
</div>
