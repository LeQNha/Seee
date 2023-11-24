<?php
    class MainPageController extends BaseController
    {
        private $imageModel;
        private $categoryModel;
        function __construct()
        {
            $this->loadModel("ImageModel");
            $this->imageModel = new ImageModel();

            $this->loadModel("CategoryModel");
            $this->categoryModel = new CategoryModel();
        }
        public function index(){
            
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

        public function GetCategoryInformation(){
            if(isset($_GET['category'])){
                $categoryName = $_GET['category'];
                $rs = $this->categoryModel->GetCategory($categoryName);
                if($rs->num_rows > 0){
                    $r = $rs->fetch_assoc();
                    echo $r['category_description'];
                }
            }else{
                echo 'Không nhận được';
            }
        }

        public function ShowCategoryImages(){
            if(isset($_GET['category'])){
                
                $categoryName = $_GET['category'];
                $result = $this->imageModel->GetImagesByCategory($categoryName);
                echo '<link rel="stylesheet" href="/Public/css/Paint.css">';

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

            }else{
                echo 'Không nhận được';
            }
        }

    }
?>