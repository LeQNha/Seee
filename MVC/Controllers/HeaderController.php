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
    public function GetUserData()
    {
        
    }
    public function LogOut()
    {
        unset($_SESSION['Login']);
        header("location: index.php?controller=HomePage");
    }
    public function UploadImage()
    {
        $data = ['Page'=>'UploadImage'];
        $this->View('Layout.MasterLayout', $data);
    }
    public function PersonalPage()
    {
        $username = $_SESSION['Login']['username'];
        //hiển thị các ảnh thích/ đã tạo
        $sql = "SELECT * FROM imgupload i INNER JOIN liked_images l
                ON i.path = l.path WHERE l.username = '$username';         
                ";
        $listShowed = "liked";
        if(isset($_GET['listShowed'])){
            $listShowed = $_GET['listShowed'];
        }
        if($listShowed == 'created'){
            $sql = "SELECT * FROM imgupload 
                    WHERE username = '$username';         
                    ";
        }
        $result_1 = $this->imageModel->DoQuery($sql);
        //Show follow
        $sql = "SELECT followed, avatar FROM follow f INNER JOIN users u ON f.followed = u.username WHERE follower = '$username'";
        $result_2 = $this->userModel->DoQuery($sql);

        $followed = '';
        
        $followList = [];
        if($result_2->num_rows >0 ){
            foreach($result_2 as $fl){
                $followed = $fl['followed'];
                $sql = "SELECT * FROM follow WHERE followed = '$followed'";
                $rs = $this->userModel->DoQuery($sql);
                array_push($followList, ['FollowedUsername'=>$fl['followed'],
                                        'FollowedAvatar'=>$fl['avatar'],
                                        'FollowerNumber'=>mysqli_num_rows($rs)
                                        ]);
            }
        }
        

        $data = [
                'Page'=>'PersonalPage',
                'Rows'=>$result_1,
                'ListShowed'=>$listShowed,
                'FollowList'=>$followList
                ];
        $this->View('Layout.MasterLayout', $data);
    }

    public function SearchImages(){

    }
}
?>