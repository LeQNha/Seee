<?php
    class CategoryPageController extends BaseController
    {
        private $userModel;
        private $categoryModel;
        public function __construct()
        {
            $this->loadModel('UserModel');
            $this->userModel = new UserModel();

            $this->loadModel('CategoryModel');
            $this->categoryModel = new CategoryModel();


        }
        public function index(){
            $this->View('Frontend.CategoryPage');
        }
        public function CategoryPage(){
            
        }

        public function AddCategory(){
            if(isset($_POST['category-name'])){
                $cn = $_POST['category-name'];
                $cd = $_POST['category-description'];

                if($_FILES["background"]["error"] === 4){
                    // echo "<script> alert('File does not exist'); </script>";
                    echo "Ảnh chưa tải lên!";
                }else{
                    $fileName = $_FILES["background"]["name"];
                    $fileSize = $_FILES["background"]["size"];
                    $tmpName = $_FILES["background"]["tmp_name"];
    
                    $validImageExtension = ['jpg','jpeg','png','webp','avif'];
                    $imageExtension = explode('.', $fileName);
                    $imageExtension = strtolower(end($imageExtension));
                    if(!in_array($imageExtension, $validImageExtension)){
                        
                        echo "Ảnh không hợp lệ";
                    }elseif($fileSize > 10000000){
                        
                        echo "Kích thước ảnh quá lớn!";
                    }else{
                        $newImageName = uniqid();
                        $newImageName .='.'.$imageExtension;
                        $newDestination = "Public/categoryimg/".$newImageName;
                        
                        move_uploaded_file($tmpName, $newDestination);
                        $sql = "INSERT INTO categories(category_name, background, category_description) VALUES('$cn','$newImageName','$cd')";
                        $this->categoryModel->DoQuery($sql);

                        echo "success";
                        
                    }
                }
                
            }else{
                echo 'ko tìm thấy';
            }
        }

       

    }
?>