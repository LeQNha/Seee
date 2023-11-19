<?php
    class UploadImageController extends BaseController{
        private $imageModel;
        function __construct()
        {
            $this->LoadModel('ImageModel');
            $this->imageModel = new ImageModel();
        }
        public function UploadImage()
        {
            $keywords = $_POST['keywords'];

            $title = $_POST["title"];
            $description = $_POST["description"];
            $category = $_POST['category'];
            if(empty($category)){
                $category = 'Khác';
            }
            $uploader = $_SESSION['Login']['username'];

            if(empty($title)){
                echo "invalid title";
            }else{
                if($_FILES["myImage"]["error"] === 4){
                    // echo "<script> alert('File does not exist'); </script>";
                    echo "Ảnh chưa tải lên!";
                }else{
                    $fileName = $_FILES["myImage"]["name"];
                    $fileSize = $_FILES["myImage"]["size"];
                    $tmpName = $_FILES["myImage"]["tmp_name"];
    
                    $validImageExtension = ['jpg','jpeg','png'];
                    $imageExtension = explode('.', $fileName);
                    $imageExtension = strtolower(end($imageExtension));
                    if(!in_array($imageExtension, $validImageExtension)){
                        
                        echo "Ảnh không hợp lệ";
                    }elseif($fileSize > 10000000){
                        
                        echo "Kích thước ảnh quá lớn!";
                    }else{
                        $newImageName = uniqid();
                        $newImageName .='.'.$imageExtension;
                        $newDestination = "Public/img/".$newImageName;
                        
                        move_uploaded_file($tmpName, $newDestination);
                        $sql = "INSERT INTO imgupload(title, path, description, username, category) VALUES('$title','$newImageName','$description','$uploader','$category')";
                        $this->imageModel->DoQuery($sql);

                        $this->AddKeyword($keywords, $newImageName);

                        echo "success";
                        
                    }
                }
            }
        }

        public function AddKeyword($kws, $path){
            $keywords = explode(",",$kws);
            
            foreach($keywords as $keyword){
                $keyword = trim($keyword);
                $sql = "SELECT keyword FROM keywords WHERE keyword = '$keyword'";
                $rs = $this->imageModel->DoQuery($sql);
                if(mysqli_num_rows($rs) > 0){
                    
                }else{
                    $sql = "INSERT INTO keywords (keyword) VALUES ('$keyword')";
                    $this->imageModel->DoQuery($sql);
                }

                $sql = "INSERT INTO image_keywords (keyword,path) VALUES ('$keyword','$path')";
                $this->imageModel->DoQuery($sql);
            }
        }
    }
?>
