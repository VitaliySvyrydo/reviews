<?php
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
        if(isset($_POST['submit']))
        {
            $validator = new Validator();
            $data = $_POST;
            $data = $validator->clean($data);
            $resultValidation = $validator->validation($data['name'], $data['surname'], $data['email'], $data['content']);
            if ($resultValidation['status'] === 1){
                $result = Reviews::addReviews($data['name'], $data['surname'], $data['email'], $data['content']);
            }
            header("Location: /?message=".$resultValidation['message'].'&status='.$resultValidation['status']);
        }
    }

}