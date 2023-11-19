<?php
    class ShowDetailContainerController extends BaseController
    {
        private $imageModel;
        private $userModel;
        private $commentModel;
        function __construct()
        {
            $this->LoadModel('UserModel');
            $this->userModel = new UserModel();

            $this->LoadModel('ImageModel');
            $this->imageModel = new ImageModel();

            $this->LoadModel('CommentModel');
            $this->commentModel = new CommentModel();
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

        public function Comment(){
            if(isset($_POST['comment'])){
                $commentContent = trim($_POST['comment']);
                $imagePath = trim($_POST['image-path']);
                echo $commentContent;
                $username = $_SESSION['Login']['username'];

                $this->commentModel->AddComment($commentContent, $username, $imagePath);
                echo 'comment success';
            }else{
                echo 'ko nhan dc';
            }
        }
        
        public function CalculateTimeGap($datetimeFromDB){
            // $datetimeFromDB = '2023-11-08 16:27:32';

            // Lấy thời gian hiện tại
            $dateTimeNow = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
            $currentDatetimeStr = $dateTimeNow->format('Y-m-d H:i:s');
            $currentDatetime = new DateTime($currentDatetimeStr);
            // Chuyển đổi ngày giờ từ database thành đối tượng DateTime
            $datetime = new DateTime($datetimeFromDB);

            // Tính toán khoảng thời gian
            $diff = $currentDatetime->diff($datetime);


            if($diff->y == 0){
                if($diff->m == 0){
                    // Kiểm tra nếu khoảng thời gian dưới một ngày
                    if ($diff->days == 0) {
                        // nếu khoảng tg dưới 1 h
                        if($diff->h == 0){
                            // nếu tg dưới 1 phút
                            if($diff->i == 0){
                                $seconds = $diff->s;
                                return $seconds.' giây trước';
                            }else{
                                $minutes = $diff->i;
                                return $minutes.' phút trước';
                            }
                        }else{
                            $hours = $diff->h;
                            return $hours.' giờ trước';
                        }
                        
                        
                    }
                    // Nếu khoảng thời gian qua một ngày
                    else {
                        $days = $diff->days;
                        
                        return $days.' ngày trước';
                    }
                }else{
                    $months = $diff->m;
                    return $months.' tháng trước';
                }
            }else{
                $years = $diff->y;
                return $years.' năm trước';
            }
            
        }

        public function GetComments(){
            if(isset($_POST['pid'])){
                $pid = $_POST['pid'];
                $result = $this->commentModel->GetComments($pid);
                $commenterAvatar = '';
                $timeGap = '';
                if($result->num_rows > 0){
                    foreach($result as $row){
                        echo '<div class="comment__card" id="'.$row['comment_id'].'">';
                        $commenterAvatar = $this->userModel->GetUserAvatar($row['username']);
                        echo '<img id="avt-img" src="./Public/profileimg/'.$commenterAvatar.'" alt="">';
                        echo '<div class="comment__info">';
                        echo '<div class="main-com-fo">';
                        echo '<span class="nickname">'.$row['username'].'</span>';
                        $timeGap = $this->CalculateTimeGap($row['comment_date']);
                        echo '<span class="currentDate">'.$timeGap.'</span>';
                        echo '</div>';
                        echo '<p class="comment">'.$row['comment_content'].'</p>';
                        echo '<div class="comment__bottom">';
                        echo '<div class="like__icon--comment">';
                        echo '<i id="like__icon" class="fa-regular fa-thumbs-up like__icon"></i>';
                        echo '<small class="count">0</small>';
                        echo '<i id="dislike__icon" class="fa-regular fa-thumbs-down dislike__icon"></i>';
                        echo '<small class="count1">0</small>';
                        echo '</div>';
                        echo '<button class="reply">Phản hồi</button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }else{
                echo 'ko nhận đc';
            }
        }

        public function GetCommentNumber(){
            if(isset($_GET['pid'])){
                $pid = $_GET['pid'];
                $sql = "SELECT comment_id FROM comments WHERE path = '$pid'";
                $rs = $this->imageModel->DoQuery($sql);

                echo $rs->num_rows;
            }else{
                echo 'Không nhận được';
            }
        }

        

    }
?>