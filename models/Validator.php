<?php


namespace App\models;
session_start();

class Validator
{

    public static function preProcessing($data)
    {
        return htmlspecialchars(trim($data));
    }

    public static function validLength($name, $data, $field, $minLength=3,$maxLength=50)
    {
        if (mb_strlen($data)<$minLength){
            $_SESSION['errors'][$field] = "в поле \"$name\" 
            должно быть указано не менее $minLength симв.\n";
            return false;
        }
        if (strlen($data)>$maxLength){
            $_SESSION['errors'][$field] = "в поле \"$name\" 
            должно быть указано не более $maxLength симв. \n";
            return false;
        }
        unset($_SESSION['errors'][$field]);
        return true;
    }
    public static function validEmail($name,$data,$field)
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][$field] = "в поле \"$name\"
                                           должен быть указан электроный адрес";
            return false;
        }
        unset($_SESSION['errors'][$field]);
        return true;
    }
}