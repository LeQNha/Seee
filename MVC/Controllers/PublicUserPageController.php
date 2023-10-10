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

        public function PublicUserPage()
        {
            $uploader = "â";
            $uploaderAvatar = "";
            if(isset($_GET['uploader'])){
            $uploader = $_GET['uploader'];

            $sql = "SELECT * FROM users WHERE username = '$uploader'";
            $result = $this->imageModel->DoQuery($sql);

            $sql = "SELECT * FROM imgupload WHERE username = '$uploader'";
            $rows = $this->imageModel->DoQuery($sql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $uploaderEmail = $row['email'];
                $uploaderFirstname = $row['firstname'];
                $uploaderLastname = $row['lastname'];
                $uploaderOcupation = $row['ocupation'];
                $uploaderLocation = $row['location'];
                $uploaderIntroduction = $row['introduction'];
                $uploaderAvatar = $row['avatar'];
            }
            
            
            }else{
                $uploader = "ko co";
            }

            //check follow
            $followButtonContent = "";
            $username = $_SESSION['Login']['username'];
            $sql = "SELECT * FROM follow WHERE followed = '$uploader' AND follower = '$username'";
            $result = $this->userModel->DoQuery($sql);

            if($result->num_rows > 0){
                $followButtonContent = "Hủy theo dõi";
            }else{
                $followButtonContent = "Theo dõi";
            }

            $data = [
                "Page"=>"PublicUserPage",
                "UploaderData"=>[
                    "uploader"=>$uploader,
                    "uploaderEmail"=>$uploaderEmail,
                    "uploaderFirstname"=>$uploaderFirstname,
                    "uploaderLastname"=>$uploaderLastname,
                    "uploaderOcupation"=>$uploaderOcupation,
                    "uploaderLocation"=>$uploaderLocation,
                    "uploaderIntroduction"=>$uploaderIntroduction,
                    "uploaderAvatar"=>$uploaderAvatar
                ],
                "FollowButtonContent"=>$followButtonContent,
                "Rows"=>$rows
                
            ];

            $this->View('Layout.MasterLayout', $data);
        
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