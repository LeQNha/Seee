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

        public function GetImage(){
            $pid = "s";

            if(isset($_POST['pid'])){
                $pid = $_POST['pid'];
                
                $title="";
                $imagePath="";
                $description ="";
                $dateuploaded = "";
                $uploader = "";
                $uploaderAvatar = "";

                $sql = "SELECT *
                  FROM imgupload INNER JOIN users
                  ON imgupload.username = users.username 
                  WHERE path = '$pid'";
                
                $rs = $this->imageModel->DoQuery($sql);
                if($rs instanceof mysqli_result){
                    if(mysqli_num_rows($rs) > 0){
                        $row = $rs->fetch_assoc();
                        
                            $title = $row['title'];
                            $imagePath = $row['path'];
                            $description = $row['description'];
                            $dateuploaded = $row['dateuploaded'];
                            $datemonthyear = explode('-', $dateuploaded);
                            $dateuploaded = $datemonthyear[2]." thg ".$datemonthyear[1].", ".$datemonthyear[0];
                            $uploader = $row['username'];
                            $uploaderAvatar = $row['avatar'];
                    
                    }
                }
                $message = array(
                    "title"=>$title, 
                    "path"=>$imagePath, 
                    "description"=>$description,
                    "dateuploaded"=>$dateuploaded,
                    "uploader"=>$uploader,
                    "uploaderAvatar"=>$uploaderAvatar
                );
                echo json_encode($message);
            }
            
        }

        function ToggleLike()
        {
            $toggle = 'like';
            if(isset($_POST['toggle'])){
                $toggle = $_POST['toggle'];
            }
            $imgId = '';
            if(isset($_POST['imgId'])){
                $imgId = $_POST['imgId'];
            }

            $username = $_SESSION['Login']['username'];


            if($toggle == 'like'){
                $sql = "INSERT INTO liked_images (path, username ) VALUES ('$imgId','$username') ";
                $this->imageModel->DoQuery($sql);
                echo "like";
            }else{
                $sql = "DELETE FROM liked_images WHERE path = '$imgId' AND username = '$username'";
                $this->imageModel->DoQuery($sql);
                echo "unlike";
            }
        }

        public function ToggleFollow()
        {
            $toggle = 'follow';
            if(isset($_POST['toggle'])){
                $toggle = $_POST['toggle'];
            }
            $uploaderName = '';
            if(isset($_POST['uploaderName'])){
                $uploaderName = $_POST['uploaderName'];
            }

            $username = $_SESSION['Login']['username'];


            if($toggle == 'follow'){
                $sql = "INSERT INTO follow (followed, follower ) VALUES ('$uploaderName','$username') ";
                $this->imageModel->DoQuery($sql);
                echo "follow";
            }else{
                $sql = "DELETE FROM follow WHERE followed = '$uploaderName' AND follower = '$username'";
                $this->imageModel->DoQuery($sql);
                echo "unfollow";
            }
        } 

        public function CheckFollow(){
            
        }

        public function CheckLikeAndFollow()
        {
            $like = "not liked";
            $follow = "not following";
            $imgId = "";
            if(isset($_POST['imgId'])){
                $imgId = $_POST['imgId'];
            }
            $username = $_SESSION['Login']['username'];
            $sql = "SELECT * FROM liked_images WHERE username = '$username' AND path = '$imgId'";
            $result = $this->imageModel->DoQuery($sql);

            if($result->num_rows > 0){
                $like = "liked";
            }else{
                $like = "not liked";
            }

            $uploaderName = "";
            if(isset($_POST['uploaderName'])){
                $uploaderName = $_POST['uploaderName'];
            }
            $username = $_SESSION['Login']['username'];
            $sql = "SELECT * FROM follow WHERE follower = '$username' AND followed = '$uploaderName'";
            $result = $this->imageModel->DoQuery($sql);

            if($result->num_rows > 0){
                $follow = "following";
            }else{
                $follow = "not following";
            }

            $message = [
                "Like"=>$like,
                "Follow"=>$follow
            ];

            echo json_encode($message);

        }

        public function RemoveImage(){
            
        }

    }
?>