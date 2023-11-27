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

        public function GetShowedList(){
            $username = $_SESSION['Login']['username'];
            //hiển thị các ảnh thích/ đã tạo
            $sql = "SELECT * FROM imgupload i INNER JOIN liked_images l
                    ON i.path = l.path
                    INNER JOIN users u
                    ON i.username = u.username 
                    WHERE l.username = '$username';         
                    ";
            $q = '';
            if(isset($_GET['q'])){
                $q = $_GET['q'];
            }
            $listShowed = "liked";
            if(isset($_GET['listShowed'])){
                $listShowed = $_GET['listShowed'];
            }
            if($listShowed == 'liked' && isset($_GET['q'])){
                $sql = "SELECT * FROM imgupload INNER JOIN image_keywords  
                        ON imgupload.path = image_keywords.path 
                        INNER JOIN users
                        ON imgupload.username = users.username
                        INNER JOIN categories
                        ON imgupload.category = categories.category 
                        INNER JOIN liked_images 
                        ON imgupload.path = liked_images.path
                        WHERE liked_images.username = '$username' AND (keyword LIKE '%$q%' OR title LIKE '%$q%' OR imgupload.username LIKE '%$q%' OR imgupload.category LIKE '%$q%') 
                        GROUP BY imgupload.path";      
            }
            if($listShowed == 'created'){
                $sql = "SELECT * FROM imgupload 
                        WHERE username = '$username';         
                        ";
            }
            if($listShowed == 'created' && isset($_GET['q'])){
                $sql = "SELECT * FROM imgupload INNER JOIN image_keywords  
                        ON imgupload.path = image_keywords.path 
                        INNER JOIN users
                        ON imgupload.username = users.username
                        INNER JOIN categories
                        ON imgupload.category = categories.category
                        WHERE imgupload.username = '$username' AND (keyword LIKE '%$q%' OR title LIKE '%$q%' OR imgupload.username LIKE '%$q%' OR imgupload.category LIKE '%$q%') 
                        GROUP BY imgupload.path";
            }
            if($listShowed == 'following'){
                $sql = "SELECT followed, avatar FROM follow f INNER JOIN users u ON f.followed = u.username WHERE follower = '$username'";
            }

            $result = $this->imageModel->DoQuery($sql);

            if($result->num_rows > 0){
                
                
                    if($listShowed == 'liked'){
                        //IN DANH SACH ANH DA LIKE

                        echo '<link rel="stylesheet" href="./Public/css/Paint.css">';
                        foreach($result as $row){

                            echo '<div class="paint" id="'.$row['path'].'" onclick="ShowDetails(\''. $row['path'] . '\')">'; 
                            echo '<img class="main-image" data-src="/Public/img/'.$row["path"].'" width="350px" alt="" loading="lazy"> ';
                            echo '<div class="image-uploader"> ';
                            echo '<div class="image-uploader-avatar-container"> ';
                            echo '<img src="/Public/profileimg/'.$row['avatar'].'" alt="">'; 
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
                            
                            echo '<i class="fa-solid fa-thumbs-up like-number"><span>'.' '.$likeNumber.'</span></i>';
                            echo '<i class="fa-regular fa-eye view-number"><span> 135</span></i>';
                            echo '</div>';
                        }
                
                    }else if($listShowed == 'created'){
                        
                        echo '<link rel="stylesheet" href="/Public/css/Paint_Created.css">';
                        foreach($result as $row){

                            echo '<div class="paint" id="'.$row['path'].'" onclick="ShowDetails_Created(\''. $row['path'] . '\')">'; 
                            echo '<img class="main-image" data-src="/Public/img/'.$row["path"].'" width="350px" alt="" loading="lazy"> ';
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
                            
                            echo '<i class="fa-solid fa-thumbs-up like-number"><span>'.' '.$likeNumber.'</span></i>';
                            echo '<i class="fa-regular fa-eye view-number"><span> 135</span></i>';
                            echo '</div>';
                        
                    }}else{
                        //IN DANH SACH FOLLOW

                        foreach($result as $following){
                            echo '<div class="followed-user">';
                            echo '<a href="/index.php?controller=Imey&action=PublicUserPage&uploader='.$following['followed'].'">';
                            echo '<div class="followed-user-avatar-container">';
                            echo '<img src="/Public/profileimg/'.$following['avatar'].'" alt="">';
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

        }


        
        
    }
?>
