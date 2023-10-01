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

            if($toggle == 'like'){
                echo "like";
            }else{
                echo "unlike";
            }
        }
       
    }
?>