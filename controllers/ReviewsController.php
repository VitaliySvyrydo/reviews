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
//            ReviewsController::addImage();
            $validator = new Validator();
            $data = $_POST;
            $data = $validator->clean($data);
            $resultValidation = $validator->validation($data['name'], $data['surname'], $data['email'], $data['content']);
            if ($resultValidation['status'] === 1){
                // ADD user
                $userID = Users::addUser($data['name'], $data['surname'], $data['email']);
                if(!empty($userID)){
                    // Add review
                    Reviews::addReviews($userID, $data['content']);
                    // Add image
                    if(Users::addImage($userID, $_FILES)){

                    }
                }


            }
            header("Location: /?message=".$resultValidation['message'].'&status='.$resultValidation['status']);
        }
    }
//    public static function getImage($id)
//    {
//        $noImage = 'no-image.jpg';
//        $path = ROOT .'/assets/images/';
//        $pathToProductImage = $path . $id . '.jpg';
//        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage))
//        {
//            return $pathToProductImage;
//        }
//        return $path . $noImage;
//    }

}