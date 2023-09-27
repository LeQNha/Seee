<?php
    class PersonalPageController extends BaseController
    {
        private $userModel;
        private $imageModel;
        function __construct()
        {
            $this->LoadModel('ImageModel');
            $this->imageModel = new ImageModel();

            $this->LoadModel('UserModel');
            $this->userModel = new UserModel();
        }
        public function EditProfile()
        {   
            $data = [
                'Page'=>'EditProfile'
            ];
            $this->View('Layout.MasterLayout', $data);
        }
    }
?>