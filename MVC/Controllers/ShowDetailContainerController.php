<?php
    class ShowDetailContainerController extends BaseController
    {
        private $imageModel;
        private $userModel;
        function __construct()
        {
            $this->LoadModel('UserModel');
            $this->userModel = new UserModel();

            $this->LoadModel('ImageModel');
            $this->imageModel = new ImageModel();
        }

        function ToggleLike()
        {
            $toggle = 'like';
            if(isset($_POST['toggle'])){
                $toggle = $_POST['toggle'];
            }
            $imgId = '';
            if(isset($_POST['imgId'])){
                $imgId = $_POST['imgId'];
            }

            $username = $_SESSION['Login']['username'];


            if($toggle == 'like'){
                $sql = "INSERT INTO liked_images (path, username ) VALUES ('$imgId','$username') ";
                $this->imageModel->DoQuery($sql);
                echo "like";
            }else{
                $sql = "DELETE FROM liked_images WHERE path = '$imgId' AND username = '$username'";
                $this->imageModel->DoQuery($sql);
                echo "unlike";
            }
        }

        public function CheckLikeImage()
        {
            $imgId = "";
            if(isset($_POST['imgId'])){
                $imgId = $_POST['imgId'];
            }
            $username = $_SESSION['Login']['username'];
            $sql = "SELECT * FROM liked_images WHERE username = '$username' AND path = '$imgId'";
            $result = $this->imageModel->DoQuery($sql);

            if($result->num_rows > 0){
                echo "liked";
            }else{
                echo "not liked";
            }

        }
       
    }
?>