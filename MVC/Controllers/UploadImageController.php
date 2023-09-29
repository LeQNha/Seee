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
            $title = $_POST["title"];
            $description = $_POST["description"];
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
                        $sql = "INSERT INTO imgupload(title, path, description, username) VALUES('$title','$newImageName','$description','$uploader')";
                        $this->imageModel->DoQuery($sql);
                        echo "success";
                        
                    }
                }
            }
        }
    }
?>