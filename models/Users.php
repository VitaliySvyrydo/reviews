<?php
class Users
{
    public static function addUser($name, $surname, $email)
    {
        $db = DB::getConnection();
        $sqlUserStr = 'INSERT INTO users (name, surname, email, image) '.'VALUES (:name, :surname, :email, :image)';
        $result = $db->prepare($sqlUserStr);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':image', $userID, PDO::PARAM_STR);
        if ($result->execute())
        {
            return $userID = $db->lastInsertId();
        }
        return false;
    }

    public static function addImage($userID, $files)
    {
        $uploaddir = ROOT . '/assets/images/upload/';
        $files['avatar']['name'] = $userID . '.jpg';
        $uploadfile = $uploaddir.basename($files['avatar']['name']);
        return move_uploaded_file($files['avatar']['tmp_name'], $uploadfile);
    }

    public static function getImage($id)
    {
        $noImage = 'no-image.jpg';
        $path = '/assets/images/upload/';
        $pathToProductImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage))
        {
            return $pathToProductImage;
        }
        return $path . $noImage;
    }
}