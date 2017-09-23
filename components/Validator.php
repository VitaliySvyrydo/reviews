<?php
class Validator {
    /**
     * @param $data
     * @return mixed
     */
    public static function clean($data)
    {
        foreach ($data as $key => $value){
            $data[$key] = htmlspecialchars(strip_tags(stripslashes(trim($value))));
        }
        return $data;
    }

    /**
     * @param $value
     * @param $min
     * @param $max
     * @return bool
     */
    public static function checkLength($value, $min, $max)
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }

    /**
     * @param $value
     * @return mixed
     */
    public static function checkEmail($value){
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    /**
     * @param $name
     * @param $surname
     * @param $email
     * @param $content
     * @return array
     */
    public function validation($name, $surname, $email, $content,$response)
    {
        if(Validator::checkLength($name, 2, 25)
            && Validator::checkLength($surname, 2, 50)
            && Validator::checkLength($content, 2, 1000)
            && Validator::checkEmail($email)
            && Validator::checkEmailExists($email)
            && Validator::reCaptcha($response)) {
            return [
                'status' => 1,
                'message' => "Спасибо за отзыв"
            ];
        }
        else {
            return [
                'status' => 0,
                'message' => "Введенные данные некорректные"
            ];
        }
    }

    /**
     * @param $email
     * @return bool
     */
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
    public static function reCaptcha($response)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $key = '6LcyyDEUAAAAAJEDvMpRnpFkzOiXyD4Ae8W3jk5p';
        $response = $_POST['g-recaptcha-response'];
        $query = $url.'?secret='.$key.'&response='.$response.'&remoteip='.$_SERVER['REMOTE_ADDR'];
        $data = json_decode(file_get_contents($query));
        if($data->success == false){
            return false;
        }
        return true;
    }
}