<?php
    class ImeyController extends BaseController
    {
        private $userModel;
        private $imageModel;
        private $categoryModel;


        public function __construct()
        {
            $this->loadModel('UserModel');
            $this->userModel = new UserModel();

            $this->loadModel('ImageModel');
            $this->imageModel = new ImageModel();

            $this->loadModel('CategoryModel');
            $this->categoryModel = new CategoryModel();
        }
        public function index(){
            
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
                                                      INNER JOIN categories
                                                      ON imgupload.category = categories.category
                                                      WHERE imgupload.username <> '$username' AND (keyword LIKE '%$q%' OR title LIKE '%$q%' OR imgupload.username LIKE '%$q%' OR imgupload.category LIKE '%$q%') 
                                                      GROUP BY imgupload.path 
                                                      ORDER BY RAND()
                                                      ");
                                                      
            }else{
                $result = $this->imageModel->DoQuery("SELECT * FROM imgupload i INNER JOIN users u  
                                                      ON i.username = u.username
                                                      WHERE i.username <> '$username' LIMIT 7;");
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

        public function UploadImage()
        {
            $categories = $this->categoryModel->GetAllCategory();
            $data = [
                'Page'=>'UploadImage',
                'Categories'=>$categories
            ];
            $this->View('Layout.MasterLayout', $data);
        }
       
        public function PersonalPage()
        {
            $username = $_SESSION['Login']['username'];

            //hiển thị các ảnh thích/ đã tạo
            $sql = "SELECT * FROM imgupload i INNER JOIN saved_images s
                    ON i.path = s.path
                    INNER JOIN users u
                    ON i.username = u.username
                    WHERE s.username = '$username';         
                    ";
            $listShowed = "saved";
            $result_1 = $this->imageModel->DoQuery($sql);
            $likedImageNumber = $result_1->num_rows;
            if(isset($_GET['listShowed'])){
                $listShowed = $_GET['listShowed'];
            }
            if($listShowed == 'created'){
                $sql = "SELECT * FROM imgupload 
                        WHERE username = '$username';         
                        ";
            }
                
            $result_1 = $this->imageModel->DoQuery($sql);
            $uploadedImageNumber = $result_1->num_rows;
            //số ảnh đã tạo/thích
            $result_2 = $this->imageModel->DoQuery("SELECT * FROM imgupload WHERE username = '$username';");
            $uploadedImageNumber = $result_2->num_rows;
            
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
            
            //số người theo dõi
            $sql = "SELECT follower FROM follow WHERE followed = '$username'";
            $followerNumber = mysqli_num_rows($this->userModel->DoQuery($sql));
            
            //số người đang theo dõi
            $sql = "SELECT followed FROM follow WHERE follower = '$username'";
            $followingNumber = mysqli_num_rows($this->userModel->DoQuery($sql));

            //lấy thông tin ng dùng
            $email = '';
            $firstname = '';
            $lastname = '';
            $ocupation = '';
            $location = '';
            $introduction = '';
            $joinningDate ='';
            $rs = $this->userModel->GetUser($username);
            if($rs->num_rows > 0){
                $r = $rs->fetch_assoc();
                $email = $r['email'];
                $firstname = $r['firstname'];
                $lastname = $r['lastname'];
                $ocupation = $r['ocupation'];
                $location = $r['location'];
                $introduction = $r['introduction'];

                $joinningDate = $r['register_date'];
                $jd = explode('-', $joinningDate);
                $joinningDate = $jd[2].' tháng '.$jd[1].', '.$jd[0];
                
            }
            $categories = $this->categoryModel->GetAllCategory();

            $data = [
                    'Page'=>'PersonalPage',
                    'Categories'=>$categories,
                    'Rows'=>$result_1,
                    'BriefInformation'=>[
                        'FollowerNumber'=>$followerNumber,
                        'FollowingNumber'=>$followingNumber,
                        'LikedImageNumber'=>$likedImageNumber,
                        'UploadedImageNumber'=>$uploadedImageNumber
                    ],
                    'UserInformation'=>[
                        'Email'=> $email,
                        'Firstname'=> $firstname,
                        'Lastname'=> $lastname,
                        'Ocupation'=> $ocupation,
                        'Location'=> $location,
                        'Introduction'=> $introduction,
                        'JoinningDate'=> $joinningDate
                    ],
                    'ListShowed'=>$listShowed,
                    'FollowList'=>$followList
                    ];
            $this->View('Layout.MasterLayout', $data);
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

            public function PublicUserPage()
        {
            $uploader = "â";
            $uploaderAvatar = "";
            if(isset($_GET['uploader'])){
            $uploader = $_GET['uploader'];

            $sql = "SELECT * FROM users WHERE username = '$uploader'";
            $result = $this->imageModel->DoQuery($sql);

            $sql = "SELECT * FROM imgupload i INNER JOIN users u  
                    ON i.username = u.username 
                    WHERE i.username = '$uploader'";
            $rows = $this->imageModel->DoQuery($sql);

            $imageUploadNumber = $rows->num_rows;

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

            $sql = "SELECT path FROM liked_images WHERE username = '$username'";
            $likedImageNumber = $this->imageModel->DoQuery($sql)->num_rows;

            $sql = "SELECT followed FROM follow WHERE follower = '$username'";
            $followingNumber = $this->imageModel->DoQuery($sql)->num_rows;

            $sql = "SELECT follower FROM follow WHERE followed = '$username'";
            $followerNumber = $this->imageModel->DoQuery($sql)->num_rows;

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
                    "uploaderAvatar"=>$uploaderAvatar,
                    "ImageUploadNumber"=>$imageUploadNumber,
                    "LikedImageNumber"=>$likedImageNumber,
                    "FollowerNumber"=>$followerNumber,
                    "FollowingNumber"=>$followingNumber
                ],
                "FollowButtonContent"=>$followButtonContent,
                "Rows"=>$rows
                
            ];

            $this->View('Layout.MasterLayout', $data);
        
        }

    }
?>