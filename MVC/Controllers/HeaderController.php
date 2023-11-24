<?php
class HeaderController extends BaseController
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

        $this->LoadModel("CategoryModel");
        $this->categoryModel = new CategoryModel();
    }
    public function index()
    {
        return $this->View('Frontend.HomePage');
    }
    public function GetUserData()
    {
        
    }
    public function LogOut()
    {
        unset($_SESSION['Login']);
        header("location: /index.php?controller=HomePage");
        // header("location: /HomePage");
    }

    public function SearchImages(){
        
    }
}
?>