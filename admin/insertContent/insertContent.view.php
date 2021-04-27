<?php include $_SERVER["DOCUMENT_ROOT"] . '/templates/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/templates/nav.php'; ?>
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<div class="auth">
    <form action="insertContent.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="title">Название материала</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="text">Текст/описание материала</label>
            <textarea name="text" id="textarea" class="ck-editor__editable_inline"></textarea>
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
                <?php foreach ($DevEnvs as $devEnv): ?>
                    <option value="<?= $devEnv->id ?>"><?= $devEnv->dev_environment ?></option>
                <?php endforeach; ?>
            </select>
        </div>
                <div>
                    <label for="file">файл (документ/архив с плагином)</label>
                    <input type="file" name="file" id="file" multiple>
                </div>
        <div>
            <label for="image">изображения</label>
            <input type="file" name="image[]" id="image" multiple>
        </div>
        <button type="submit" name="submit" value="ok">
            Добавить
        </button>
    </form>
</div>
    <script>
        ClassicEditor
            .create(document.querySelector('#textarea'))
            .catch(error => {
                console.error(error);
            });
    </script>
<?php include $_SERVER['DOCUMENT_ROOT']. '/templates/footer.php';