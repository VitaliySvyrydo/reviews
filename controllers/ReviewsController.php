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
            $status = $_GET['status'];
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
            $resultValidation = $validator->validation($data['name'], $data['surname'],
                $data['email'], $data['content'],$data['g-recaptcha-response']);
            if ($resultValidation['status'] === 1){
                $userID = Users::addUser($data['name'], $data['surname'], $data['email']);
                if(!empty($userID)){
                    Reviews::addReviews($userID, $data['content']);
                    if(Users::addImage($userID, $_FILES)){

                    }
                }


            }
            header("Location: /?message=".$resultValidation['message'].'&status='.$resultValidation['status']);
        }
    }
}