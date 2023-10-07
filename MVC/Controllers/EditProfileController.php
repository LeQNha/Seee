<?php
    class EditProfileController extends BaseController
    {
        private $userModel;
        public function __construct()
        {
            $this->loadModel('UserModel');
            $this->userModel = new UserModel();
        }
        public function Save(){
       
                $username = $_SESSION['Login']['username'];

                $email = trim($_POST['email']);
                $newUsername = trim($_POST['username']);
                $password = trim($_POST['password']);
                $confirmpassword = trim($_POST['confirmpassword']);
                $firstname = trim($_POST['firstname']);
                $lastname = trim($_POST['lastname']);
                $ocupation = trim($_POST['ocupation']);
                $location = trim($_POST['location']);
                $introduction = trim($_POST['introduction']);
                $avatar = "";

                $sql = "SELECT * FROM users WHERE username = '$username'";
                    $result = $this->userModel->DoQuery($sql);

                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                    
                        // Truy cập vào dữ liệu
                            $avatar = $row['avatar'];
                    }
                
                $validImage = true;
                if($_FILES['avatar-file']['error'] === 4){
                    
                }else{
                    $imgName = $_FILES['avatar-file']['name'];
                    $imgSize = $_FILES['avatar-file']['size'];
                    $tmpName = $_FILES['avatar-file']['tmp_name'];

                    $validImageExtension = ['jpg','jpeg','png'];
                    $imageExtension = explode('.', $imgName);
                    $imageExtension = strtolower(end($imageExtension));
                    if(!in_array($imageExtension, $validImageExtension)){
                        $validImage = false;        
                        echo "Ảnh không hợp lệ";
                    }elseif($imgSize > 10000000){
                        $validImage = false;
                        echo "Kích thước ảnh quá lớn!";
                    }else{
                        $newImageName = uniqid();
                        $newImageName .='.'.$imageExtension;
                        $newDestination = "Public/profileimg/".$newImageName;
                                
                        move_uploaded_file($tmpName, $newDestination);
                        
                        if($avatar != $newImageName){
                            $avatar = $newImageName;
                        }
                        
                    }
                }

                if($validImage == true){
                    if($password != $confirmpassword){
                        echo "Xác nhận lại mật khẩu!";
                    }else if(empty($email)){
                        echo "Email không hợp lệ!";
                    }else if(empty($newUsername)){
                        echo "Tài khoản không hợp lệ!";
                    }else if(empty($password)){
                        echo "Mật khẩu không hợp lệ!";
                    }else{
                        $sql = "UPDATE users
                            SET email = '$email', username = '$newUsername', password = '$password', firstname = '$firstname', lastname = '$lastname', ocupation = '$ocupation', location = '$location', introduction ='$introduction', avatar = '$avatar' 
                            WHERE username = '$username';";

                            $_SESSION['Login']['username'] = $newUsername;
                            $username = $newUsername;

                        $result = $this->userModel->DoQuery($sql);
                        echo "success";
                    }
                }
        }
    }
?>