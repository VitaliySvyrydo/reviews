<?php
class Users
{
    /**
     * @param $name
     * @param $surname
     * @param $email
     * @return bool|string
     */
    public static function addUser($name, $surname, $email)
    {
        $db = DB::getConnection();
        $sqlUserStr = 'INSERT INTO users (name, surname, email) '.'VALUES (:name, :surname, :email)';
        $result = $db->prepare($sqlUserStr);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        if ($result->execute())
        {
            return $userID = $db->lastInsertId();
        }
        return false;
    }

    /**
     * @param $userID
     * @param $files
     * @return bool
     */
    public static function addImage($userID, $files)
    {
        $uploaddir = ROOT . '/template/images/upload/';
        $files['avatar']['name'] = $userID . '.jpg';
        $uploadfile = $uploaddir.basename($files['avatar']['name']);
        return move_uploaded_file($files['avatar']['tmp_name'], $uploadfile);
    }

    public static function getImage($id)
    {
        $noImage = 'no-image.jpg';
        $path = '/template/images/upload/';
        $pathToProductImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage))
        {
            return $pathToProductImage;
        }
        return $path . $noImage;
    }
}