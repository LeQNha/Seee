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

            // $listShowed = "liked";
            // if(isset($_GET['listShowed'])){
            //     $listShowed = $_GET['listShowed'];
            // }

            //hiển thị các ảnh thích/ đã tạo
            $sql = "SELECT * FROM imgupload i INNER JOIN liked_images l
                    ON i.path = l.path
                    INNER JOIN users u
                    ON i.username = u.username 
                    WHERE l.username = '$username';         
                    ";
            $listShowed = "liked";
            if(isset($_GET['listShowed'])){
                $listShowed = $_GET['listShowed'];
            }
            if($listShowed == 'created'){
                $sql = "SELECT * FROM imgupload 
                        WHERE username = '$username';         
                        ";
            }else if($listShowed == 'following'){
                $sql = "SELECT followed, avatar FROM follow f INNER JOIN users u ON f.followed = u.username WHERE follower = '$username'";
            }

            $result = $this->imageModel->DoQuery($sql);

            if($result->num_rows > 0){
                
                
                    if($listShowed == 'liked' || $listShowed == 'created'){
                        //IN DANH SACH ANH DA LIKE

                        echo '<link rel="stylesheet" href="./Public/css/Paint.css">';
                        foreach($result as $row){

                            echo '<div class="paint" onclick="ShowDetails(\''. $row['path'] . '\')">'; 
                            echo '<img class="main-image" src="Public/img/'.$row["path"].'" width="350px" alt="" loading="lazy"> ';
                            echo '<div class="image-uploader"> ';
                            echo '<div class="image-uploader-avatar-container"> ';
                            echo '<img src="./Public/profileimg/'.$row['avatar'].'" alt="">'; 
                            echo '</div> ';
                            echo '<span class="uploader-username">'.$row['username'].'</span>';
                            echo '</div> ';
                            echo '<h4 class="image-title">'.$row['title'].'</h4>';

                            $path = $row['path'];
                            $sqll = "SELECT path FROM liked_images WHERE path = '$path'";
                            $likeNumber = mysqli_num_rows($this->imageModel->DoQuery($sqll));
                            $likeNumberFomatted = number_format($likeNumber,0,'',' ');

                            if($likeNumber<100000){
                                $likeNumber = $likeNumberFomatted;
                            }else{
                                $likeNumber = '100 000+';
                            }
                            
                            echo '<i class="fa-solid fa-thumbs-up like-number"><span>'.$likeNumber.'</span></i>';
                            echo '</div>';
                        }
                
                    }else{
                        //IN DANH SACH FOLLOW

                        foreach($result as $following){
                            echo '<div class="followed-user">';
                            echo '<a href="index.php?controller=PublicUserPage&action=PublicUserPage&uploader='.$following['followed'].'">';
                            echo '<div class="followed-user-avatar-container">';
                            echo '<img src="./Public/profileimg/'.$following['avatar'].'" alt="">';
                            echo '</div>';
                            echo '<span class="followed-user-username">'.$following['followed'].'</span>';
                            echo '</a>';

                            $sql = "SELECT * FROM follow WHERE followed = '".$following['followed']."'";
                            $rs = $this->userModel->DoQuery($sql);
                            
                            echo '<p class="follower-number">'.mysqli_num_rows($rs).' người theo dõi</p>';
                            echo '</div>';
                        }
                        
                    }
            }

            // $imagePath = '';;
            // $imageTitle = '';
            // $images = [];
            // if($result->num_rows > 0){
            //     foreach($result as $row){
            //         $imagePath = $row['path'];
            //         $imageTitle = $row['title'];
            //         array_push($images, ['path'=>$imagePath,'title'=>$imageTitle] );
            //     }

            //     echo json_encode($images);
            // }else{
            //     if($listShowed == 'liked'){
            //         echo 'Chưa yêu thích ảnh nào';
            //     }else if($listShowed == 'created'){
            //         echo 'Chưa tạo ảnh nào';
            //     }
            // }
        }
    }
?>
