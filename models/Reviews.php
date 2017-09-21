<?php
class Reviews
{
    /**
     * @return array
     */
    public static function getReviewsList()
    {
        $db = DB::getConnection();
        $reviewsList = array();
        $result = $db->query('SELECT name,surname,content FROM users,reviews WHERE users.id = reviews.author_id');
        $i = 0;
        while($row = $result->fetch()){
            $reviewsList[$i] ['name'] = $row['name'];
            $reviewsList[$i] ['surname'] = $row['surname'];
            $reviewsList[$i] ['content'] = $row['content'];
            $i++;
        }

        return $reviewsList;
    }

    /**
     * @param $name
     * @param $surname
     * @param $email
     * @param $content
     * @return bool
     */
    public static function addReviews($name, $surname, $email, $content)
    {
        $db = DB::getConnection();
        $sqlUserStr = 'INSERT INTO users (name, surname, email) '. 'VALUES (:name, :surname, :email )';
        $result = $db->prepare($sqlUserStr);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname',$surname , PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if($result->execute()){
            $userID = $db->lastInsertId();
            $sqlReviewStr = 'INSERT INTO reviews (content, author_id) '. 'VALUES (:content, :author_id)';
            $result = $db->prepare($sqlReviewStr);
            $result->bindParam(':content', $content, PDO::PARAM_STR);
            $result->bindParam(':author_id', $userID, PDO::PARAM_STR);
            return $result->execute();
        };
        return false;
    }
}