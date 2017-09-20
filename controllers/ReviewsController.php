<?php

include_once ROOT.'/models/Reviews.php';

class ReviewsController
{
    /**
     *
     */
    public function actionView()
    {
        $reviewsList = array();
        $reviewsList = Reviews::getReviewsList();
        if(!empty($_GET['message'])) {
            $message = $_GET['message'];
        };
        require_once ROOT.'/views/reviews/index.php';
    }

    /**
     * @return bool
     */
    public function actionAddReviews()

    {
        $message = 'error';
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $content = $_POST['content'];

            $result = Reviews::addReviews($name, $surname, $email, $content);

            if($result){
                $message = 'success';
            }
        }
         header("Location: /?message=".$message);
    }

}