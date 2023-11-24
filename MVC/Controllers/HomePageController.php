<?php
    class HomePageController extends BaseController
    {
        private $imageModel;
        private $userModel;
        private $categoryModel;
        function __construct()
        {
            $this->LoadModel("ImageModel");
            $this->imageModel = new ImageModel();
            
            $this->LoadModel("UserModel");
            $this->userModel = new UserModel();

            $this->LoadModel('CategoryModel');
            $this->categoryModel = new CategoryModel();
        }
        public function index()
        {
            return $this->View('Frontend.HomePage');
        }
        public function Login()
        {   
           return $this->View('Users.Login');
        }
        
        
    }
?>
