<?php
   class ShowDetailContainer_CreatedController extends BaseController
   {
        private $imageModel;
        private $commentModel;
        private $userModel;
        function __construct()
        {
            $this->LoadModel('ImageModel');
            $this->imageModel = new ImageModel();

            $this->LoadModel('CommentModel');
            $this->commentModel = new CommentModel();

            $this->LoadModel('UserModel');
            $this->userModel = new UserModel();
        }

        function DeleteImage(){
            if(isset($_POST['pid'])){
                $pid = $_POST['pid'];

                $this->imageModel->DeleteImage($pid);

                echo 'remove success';
            }
        }

        function UpdateImage(){
            if(isset($_GET['pid'])){
                $pid = $_GET['pid'];
                $detailTitleCreated = $_POST['detailTitleCreated'];
                $descriptionCreated = $_POST['descriptionCreated'];

                // if(empty($detailTitleCreated) || empty($descriptionCreated)){
                //     echo 'Không được để trống';
                // }

                $this->imageModel->UpdateImage($pid, $detailTitleCreated, $descriptionCreated);

                echo 'update success';
            }else{
                echo 'ko nhận';
            }

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

        // public function GetComments(){
        //     if(isset($_POST['pid'])){
        //         $pid = $_POST['pid'];
        //         $result = $this->commentModel->GetComments($pid);
        //         $commenterAvatar = '';
        //         $timeGap = '';
        //         if($result->num_rows > 0){
        //             foreach($result as $row){
        //                 echo '<div class="comment__card1" id="'.$row['comment_id'].'">';
        //                 $commenterAvatar = $this->userModel->GetUserAvatar($row['username']);
        //                 echo '<img id="avt-img1" src="/Public/profileimg/'.$commenterAvatar.'" alt="">';
        //                 echo '<div class="comment__info1">';
        //                 echo '<div class="main-com-fo1">';
        //                 echo '<span class="nickname1">'.$row['username'].'</span>';
        //                 $timeGap = $this->CalculateTimeGap($row['comment_date']);
        //                 echo '<span class="currentDate1">'.$timeGap.'</span>';
        //                 echo '</div>';
        //                 echo '<p class="comment10">'.$row['comment_content'].'</p>';
        //                 echo '<div class="comment__bottom1">';
        //                 echo '<div class="like__icon--comment1">';
        //                 echo '<i id="like__icon1" class="fa-regular fa-thumbs-up like__icon1"></i>';
        //                 echo '<small class="counted">0</small>';
        //                 echo '<i id="dislike__icon1" class="fa-regular fa-thumbs-down dislike__icon"></i>';
        //                 echo '<small class="counted1">0</small>';
        //                 echo '</div>';
        //                 echo '<button class="reply1">Phản hồi</button>';
        //                 echo '<button onclick="deleteDiv('.$row['comment_id'].')" class="delete1">Xóa</button>';
        //                 echo '</div>';
        //                 echo '</div>';
        //                 echo '</div>';
        //             }
        //         }
        //     }else{
        //         echo 'ko nhận đc';
        //     }
        // }

        public function GetComments($pid = '', $order = 'DESC'){
            if(isset($_POST['pid']) || $pid != ''){
                if(isset($_POST['pid'])){
                    $pid = $_POST['pid'];
                }
                $result = $this->commentModel->GetComments($pid, $order);
                $commenterAvatar = '';
                $timeGap = '';
                $comments = '';
                if($result->num_rows > 0){
                    foreach($result as $row){
                        $comments .= '<div class="comment__card1" id="'.$row['comment_id'].'">';
                        $commenterAvatar = $this->userModel->GetUserAvatar($row['username']);
                        $comments .= '<img id="avt-img1" src="/Public/profileimg/'.$commenterAvatar.'" alt="">';
                        $comments .= '<div class="comment__info1">';
                        $comments .= '<div class="main-com-fo1">';
                        $comments .= '<span class="nickname1">'.$row['username'].'</span>';
                        $timeGap = $this->CalculateTimeGap($row['comment_date']);
                        $comments .= '<span class="currentDate1">'.$timeGap.'</span>';
                        $comments .= '</div>';
                        $comments .= '<p class="comment10">'.$row['comment_content'].'</p>';
                        $comments .= '<div class="comment__bottom1">';
                        $comments .= '<div class="like__icon--comment1">';
                        $comments .= '<i id="like__icon1" class="fa-regular fa-thumbs-up like__icon1"></i>';
                        $comments .= '<small class="counted">0</small>';
                        $comments .= '<i id="dislike__icon1" class="fa-regular fa-thumbs-down dislike__icon"></i>';
                        $comments .= '<small class="counted1">0</small>';
                        $comments .= '</div>';
                        $comments .= '<button class="reply1">Phản hồi</button>';
                        $comments .= '<button onclick="deleteDiv('.$row['comment_id'].')" class="delete1">Xóa</button>';
                        $comments .= '</div>';
                        $comments .= '</div>';
                        $comments .= '</div>';
                    }
                    echo $comments;
                }
            }else{
                echo 'ko nhận đc';
            }
        }

        public function FilterComment(){
            if(isset($_GET['comFilter'])){
                $comFilter = $_GET['comFilter'];
                $pid = $_GET['pid'];
                $order = 'DESC';
                switch($comFilter){
                    case 'newestComment':
                        $order = 'DESC';
                        break;
                    case 'oldestComment':
                        $order = 'ASC';
                        break;
                }
                $comments = $this->GetComments($pid, $order);
                echo $comments;
            }
        }

        public function DeleteComment(){
            if(isset($_POST['comId'])){
                $comId = $_POST['comId'];
                $this->commentModel->DeleteComment($comId);
                echo 'Đã xóa';
            }else{
                echo 'Không tìm thấy comment!';
            }
        }


   }
?>