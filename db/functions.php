<?php
function loadImg($maxFileSize, $validFileTypes, $uploadPath, $nameElem){
    $error="";
    $newName="";
    if (isset($_FILES[$nameElem])) {
        $file = $_FILES[$nameElem];

        if (!empty($file['error'])) {
            $error = 'произошла ошибка загрузки данных...';
        } else if ($file['size'] > $maxFileSize) {
            $error = "файл слишком велик (больше 5мб)";
        } else {
            $type = mime_content_type($file['tmp_name']);
            $name = pathinfo($file['name'], PATHINFO_FILENAME) . '_' . time();
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $newName = "$name.$ext";

            if (in_array($type, $validFileTypes)) {
                if (!move_uploaded_file($file['tmp_name'], $uploadPath . $newName)) {
                    $error = "не удалось загрузить изображение...";
                }
            } else {
                $error = "расширение файла должно быть Jpeg, jpg или png...";
            }
        };
        if (!empty($error)) {
            $error = $file['name'] . '-' . $error;
        }
    }
    return [$error, $newName];

}

function deleteImg($file){
    if(is_file($file)){
        unlink($file);
    }
}

function loadFile($maxFileContentSize,$uploadPathContent,$nameElem){
    $error="";
    $newName="";
    if (isset($_FILES[$nameElem])){
        $file= $_FILES[$nameElem];

        if (!empty($file['error'])){
            $error='произошла ошибка загрузки данных...';
        }else if ($file['size']>$maxFileContentSize){
            $error='файл слишком велик(больше 50мб)...';
        }else{
            $type=mime_content_type($file['tmp_name']);
            $name = pathinfo($file['name'],PATHINFO_FILENAME). '_'. time();
            $ext = pathinfo($file['name'],PATHINFO_EXTENSION);
            $newName="$name.$ext";
        };
        if (!empty($error)) {
            $error = $file['name'] . '-' . $error;
        }
    }
    return [$error, $newName];
}