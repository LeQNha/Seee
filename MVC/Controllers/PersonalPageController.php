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
            $username = $_SESSION['Login']['username'];
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $this->userModel->DoQuery($sql);

            $email = "";
            $username = "";
            $password = "";
            $firstname = "";
            $lastname = "";
            $ocupation = "";
            $location = "";
            $introduction = "";
            $avatar = "";
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();

                $email = trim($row['email']) ;
                $username = trim($row['username']);
                $password = trim($row['password']);
                $firstname = trim($row['firstname']);
                $lastname = trim($row['lastname']);
                $ocupation = trim($row['ocupation']);
                $location = trim($row['location']);
                $introduction = trim($row['introduction']);
                $avatar = trim($row['avatar']);
            }
            
            $userData = [
                'Email'=>$email,
                'Username'=>$username,
                'Password'=>$password,
                'Firstname'=>$firstname,
                'Lastname'=>$lastname,
                'Ocupation'=>$ocupation,
                'Location'=>$location,
                'Introduction'=>$introduction,
                'Avatar'=>$avatar,
            ];
            $data = [
                'Page'=>'EditProfile',
                'UserData'=>$userData
            ];
            $this->View('Layout.MasterLayout', $data);
        }

        public function GetShowedList(){
            $username = $_SESSION['Login']['username'];

            $listShowed = "liked";
            if(isset($_GET['listShowed'])){
                $listShowed = $_GET['listShowed'];
            }

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
            $result = $this->imageModel->DoQuery($sql);

            $imagePath = '';;
            $imageTitle = '';
            $images = [];
            if($result->num_rows > 0){
                foreach($result as $row){
                    $imagePath = $row['path'];
                    $imageTitle = $row['title'];
                    array_push($images, ['path'=>$imagePath,'title'=>$imageTitle] );
                }

                echo json_encode($images);
            }else{
                if($listShowed == 'liked'){
                    echo 'Chưa yêu thích ảnh nào';
                }else if($listShowed == 'created'){
                    echo 'Chưa tạo ảnh nào';
                }
            }
        }
    }
?>