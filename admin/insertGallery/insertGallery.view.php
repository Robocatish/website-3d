<?php
include $_SERVER["DOCUMENT_ROOT"] . '/templates/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/templates/nav.php'; ?>
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<div class="auth">
    <form action="insertGallery.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="title">Название</label>
            <input type="text" id="title" name="title" class="authInput">
        </div><br>
        <div>
            <label for="image">иллюстрация</label>
            <input type="file" id="image" name="image" class="authInput">
        </div>
        <div>
            <label for="text">описание</label>
            <textarea name="info" id="textarea" class="ck-editor__editable_inline">
            </textarea>
        </div>
        <button type="submit" name="submit" class="enterInAccount">Добавить</button>
    </form>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#textarea'))
        .catch(error => {
            console.error(error);
        });
</script>