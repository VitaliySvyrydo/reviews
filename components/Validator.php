<?php
class Validator {
    public static function clean($value = "")
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        return $value;
    }
    public static function checkLength($value = "", $min, $max)
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }
    public function Validation($name, $surname, $email, $content)
    {
        if(!empty($name) && !empty($surname) && !empty($email) && !empty($content)) {
            $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
            if(Validator::checkLength($name, 2, 25) && Validator::checkLength($surname, 2, 50)
                && Validator::checkLength($content, 2, 500) && $email_validate) {

                echo "Спасибо за отзыв";
            } else {
                echo "Введенные данные некорректные";
            }
        } else {
            echo "Заполните пустые поля";
        }
    }
//    public static function checkEmail($email)
//    {
//        if (filter_var($email, FILTER_VALIDATE_EMAIL))
//        {
//            return true;
//        }
//        return false;
//    }
//    public static function checkEmailExists($email)
//    {
//        $db = DB::getConnection();
//        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
//
//        $result = $db->prepare($sql);
//        $result->bindParam(':email', $email, PDO::PARAM_STR);
//        $result->execute();
//
//        if ($result->fetchColumn())
//            return true;
//        return false;
//    }
}