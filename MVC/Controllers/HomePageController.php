<?php
    class HomePageController extends BaseController
    {
        private $imageModel;
        private $userModel;
        function __construct()
        {
            $this->LoadModel("ImageModel");
            $this->imageModel = new ImageModel();
            
            $this->LoadModel("UserModel");
            $this->userModel = new UserModel();
        }
        public function index()
        {
            return $this->View('Frontend.HomePage');
        }
        public function Login()
        {   
           return $this->View('Users.Login');
        }
        public function Register()
        {
            return $this->View('Users.Register');
        }
        public function MainPage(){
            $username = $_SESSION['Login']['username'];
            $result = $this->imageModel->DoQuery("SELECT * FROM imgupload WHERE username <> '$username'");
            
            $data = [
                "Page"=>"MainPage",
                "Rows"=>$result
            ];

            return $this->View('Layout.MasterLayout', $data);
        }
    }
?>
