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
        $result = $db->query('SELECT name,surname,content,author_id FROM users,reviews WHERE users.id = reviews.author_id');
        $i = 0;
        while($row = $result->fetch()){
            $reviewsList[$i] ['name'] = $row['name'];
            $reviewsList[$i] ['surname'] = $row['surname'];
            $reviewsList[$i] ['content'] = $row['content'];
            $reviewsList[$i] ['image'] = Users::getImage($row['author_id']);
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
    public static function addReviews($userID, $content)
    {
        $db = DB::getConnection();
        $sqlReviewStr = 'INSERT INTO reviews (content, author_id) '.'VALUES (:content, :author_id)';
        $result = $db->prepare($sqlReviewStr);
        $result->bindParam(':content', $content, PDO::PARAM_STR);
        $result->bindParam(':author_id', $userID, PDO::PARAM_STR);
        return $result->execute();
    }
}