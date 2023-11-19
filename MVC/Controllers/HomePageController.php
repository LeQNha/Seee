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
        public function Register()
        {
            return $this->View('Users.Register');
        }
        public function MainPage(){

            $result = '';
            $username = $_SESSION['Login']['username'];
            $q = "";
            if(isset($_GET['q'])){
                $q = $_GET['q'];
                $result = $this->imageModel->DoQuery("SELECT * FROM imgupload INNER JOIN image_keywords  
                                                      ON imgupload.path = image_keywords.path 
                                                      INNER JOIN users
                                                      ON imgupload.username = users.username
                                                      WHERE imgupload.username <> '$username' AND (keyword LIKE '%$q%' OR title LIKE '%$q%') 
                                                      GROUP BY imgupload.path 
                                                      ORDER BY RAND()");
                                                      
            }else{
                $result = $this->imageModel->DoQuery("SELECT * FROM imgupload i INNER JOIN users u  
                                                      ON i.username = u.username
                                                      WHERE i.username <> '$username' ORDER BY RAND();");
            }

            $categories = $this->categoryModel->GetAllCategory();
            $data = [
                "Page"=>"MainPage",
                "SearchQuery"=>$q,
                "Rows"=>$result,
                "Categories"=>$categories
            ];

            return $this->View('Layout.MasterLayout', $data);
        }
    }
?>
