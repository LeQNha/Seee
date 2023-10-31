<?php
    class AdminPageController extends BaseController
    {
        private $imageModel;
        private $userModel;
        function __construct()
        {
            $this->LoadModel("ImageModel");
            $this->imageModel = new ImageModel();
            
            $this->LoadModel("UserModel");
            $this->userModel = new UserModel();

            $result = $this->userModel->GetAllUser();

            $data = [
                        'Result'=>$result,
                        'List'=>'UserList'
                    ];

            $this->View('AdminPage.AdminPage', $data);
            
        }
        public function index(){
            
        }
        
    }
?>