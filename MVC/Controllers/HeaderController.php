<?php
class HeaderController extends BaseController
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
    public function LogOut(){
        unset($_SESSION['Login']);
        header("location: index.php?controller=HomePage");
    }
}
?>