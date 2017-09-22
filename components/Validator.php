<?php
class Validator {
    public static function clean($data)
    {
        foreach ($data as $key => $value){
            $data[$key] = htmlspecialchars(strip_tags(stripslashes(trim($value))));
        }
        return $data;
    }

    public static function checkLength($value, $min, $max)
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }
    public static function checkEmail($value){
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function validation($name, $surname, $email, $content)
    {
        if(Validator::checkLength($name, 2, 25)
            && Validator::checkLength($surname, 2, 50)
            && Validator::checkLength($content, 2, 500)
            && Validator::checkEmail($email)
            && Validator::checkEmailExists($email)) {
            return [
                'status' => 1,
                'message' => "Спасибо за отзыв"
            ];
        } else {
            return [
                'status' => 0,
                'message' => "Введенные данные некорректные"
            ];
        }
    }

    public static function checkEmailExists($email)
    {
        $db = DB::getConnection();
        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn() > 0){
            return false;
        }
        return true;
    }
}