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

function loadSomeImage($maxFileSize,$validFileTypes,$uploadPath,$nameElem):array
{
    $files=$_FILES[$nameElem];
    $countFiles = count($_FILES[$nameElem]['error']);
    $error="";
    $errors=[];
    $fileNames=[];
    for ($k=0; $k<$countFiles;$k++)
    {
        $name=pathinfo($files["name"][$k], PATHINFO_FILENAME). '_' .time();
        $type=pathinfo($files["name"][$k],PATHINFO_EXTENSION);

        $file = "$name.$type";

        if($files["size"][$k]>$maxFileSize){
            $error="Размер файла не должен превышать {$maxFileSize} МБайт.";
        }elseif (!empty($files["error"][$k])){
            $error="Ошибка загрузки файла";
        }else{
            $type=mime_content_type($files["tmp_name"][$k]);
            $fileName=$uploadPath . $file;

            if (in_array($type,$validFileTypes)){
                if (!move_uploaded_file($files["tmp_name"][$k],$fileName)){
                    $error="не удалось загрузить картинку";
                }
            }else{
                $error="Расширение должно быть png,jpg, jpeg";
            }
        }
        if (!empty($error)){
            $error="{$files["name"][$k]} - {$error}";
            $errors[]=$error;
        }else{
            $fileNames[]=$file;
        }
    }
    return[$errors,$fileNames];
}




function loadFile($maxFileContentSize,$validFileContentTypes,$uploadPathContent,$nameElem){
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
            if (in_array($type, $validFileContentTypes)) {
                if (!move_uploaded_file($file['tmp_name'], $uploadPathContent . $newName)) {
                    $error = "не удалось загрузить файл...";
                }
            } else {
                $error = "расширение файла должно быть doc или rar...";
            }
        };
        if (!empty($error)) {
            $error = $file['name'] . '-' . $error;
        }
    }
    return [$error, $newName];
}

function deleteSomeImage($files_Arr,$uploadPath):string
{
    $error = "";
    if(!empty($files_Arr)) {
        foreach ($files_Arr as $file) {
            if (!unlink($uploadPath.$file->image)) {
                $error .= " Ошибка удаления файла ";
            }
        }
    }
    return $error;
}

function deleteFile($file){
    if (is_file($file)){
        unlink($file);
    }
}
