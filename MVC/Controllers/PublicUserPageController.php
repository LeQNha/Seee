<?php
    class PublicUserPageController extends BaseController
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

        public function ToggleFollow()
        {
            $toggle = 'follow';
            if(isset($_POST['toggle'])){
                $toggle = $_POST['toggle'];
            }
            $publicUser = '';
            if(isset($_POST['publicUser'])){
                $publicUser = $_POST['publicUser'];
            }

            $username = $_SESSION['Login']['username'];


            if($toggle == 'follow'){
                $sql = "INSERT INTO follow (followed, follower ) VALUES ('$publicUser','$username') ";
                $this->imageModel->DoQuery($sql);
                echo "follow";
            }else{
                $sql = "DELETE FROM follow WHERE followed = '$publicUser' AND follower = '$username'";
                $this->imageModel->DoQuery($sql);
                echo "unfollow";
            }
        }
       
        // public function CheckFollow()
        // {
        //     $publicUser="";
        //     if(isset($_POST['publicUser'])){
        //         $publicUser = $_POST['publicUser'];
        //     }
        //     $username = $_SESSION['Login']['username'];
        //     $sql = "SELECT * FROM follow WHERE followed = '$publicUser' AND follower = '$username'";
        //     $result = $this->userModel->DoQuery($sql);

        //     if($result->num_rows > 0){
        //         echo "followed";
        //     }else{
        //         echo "not followed";
        //     }
        // }
    }
    
?>