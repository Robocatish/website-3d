<?php include $_SERVER['DOCUMENT_ROOT']. '/templates/header.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/nav.php'; ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <div class="auth">
        <form action="updateContent.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="hidden" name="id" value="<?=$content->id?>">
            </div>
            <div>
                <label for="title">Название материала</label>
                <input type="text" name="title" id="title" value="<?=$content->title?>">
            </div>
            <div>
                <label for="text">Текст/описание материала</label>
                <textarea name="text" id="textarea" class="ck-editor__editable_inline"><?=$content->text?></textarea>
            </div>
            <div>
                <label for="type">тип материала</label>
                <select name="type" id="type">
                    <option value="lesson" <?=$content->type=="lesson"?'selected':''?>>Урок</option>
                    <option value="plugin" <?=$content->type=="plugin"?'selected':''?>>Плагин</option>
                </select>
            </div>
            <div>
                <label for="DevEnv">рабочая среда</label>
                <select name="program_id" id="program_id">
                    <?php foreach ($DevEnvs as $devEnv): ?>
                        <option value="<?= $devEnv->id ?>" <?=$content->program_id==$devEnv->id?'selected':''?>><?= $devEnv->dev_environment ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="file">файл (документ/архив с плагином)</label>
                <input type="file" name="file" id="file" multiple>
                <img src="../../files/<?=$content->file?>">
            </div>
            <div>
                <label for="image">изображения</label>
                <input type="file" name="image[]" id="image" multiple>
                <div>
                <?php foreach ($allImages as $file):?>
                <img src="../../img/<?=$file->image?>" alt="загруженные картинки" style="width: 200px" id="loadimage">
                <?php endforeach;?>
                </div>
            </div>
            <button type="submit" name="submitUpdate">
                изменить
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
    <script>
        let loadImage = document.querySelector("#loadimage"),
            image = document.querySelector("#image");

        image.addEventListener('change', function (e){
            loadImage.src = URL.createObjectURL(e.target.files[0]);
            loadImage.style.display = 'block';
            loadImage.onLoad = function (){
                URL.revokeObjectURL(e.target.src)
            };
        })
    </script>
<?php include $_SERVER['DOCUMENT_ROOT']. '/templates/footer.php';