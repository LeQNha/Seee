<?php
    class AdminPageController extends BaseController
    {
        private $imageModel;
        private $userModel;
        private $categoryModel;

        function __construct()
        {
            $this->LoadModel("ImageModel");
            $this->imageModel = new ImageModel();
            
            $this->LoadModel("UserModel");
            $this->userModel = new UserModel();

            $this->LoadModel("CategoryModel");
            $this->categoryModel = new CategoryModel();
            
        }
        public function index(){
            $result = '';

            $list = 'UserList';

            if(isset($_GET['list'])){
                $list = $_GET['list'];
                if($list == 'UsersManagement'){
                    $list = 'UserList';
                    $result = $this->userModel->GetAllUser();
                    
                }else{
                    $list = 'ImageList';
                    $result = $this->imageModel->GetAllImage();
                }
            }else{
                $list = 'UserList';
                // echo $list;
                $result = $this->userModel->GetAllUser();
            }

            $categories = $this->categoryModel->GetAllCategory();
        
            $data = [
                        'Result'=> $result,
                        'List'=> $list,
                        'Categories'=>$categories
                    ];

            $this->View('AdminPage.AdminPage', $data);
        }

        public function SwitchManagement(){
            $count = 0;
            if(isset($_GET['list'])){
                $list = $_GET['list'];
                if($list == 'UsersManagement'){
                    $result = $this->userModel->GetAllUser();
         
                    // echo '<div class="add-delete-buttons">';
                    // echo '<button class="add-button">Thêm</button>';
                    // echo '<button class="delete-all-button btn btn-primary" id="delete-all-button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: #e5dede; border: none; color:black;">Xóa tất cả</button>';
                    // echo '</div>';

                    echo '<div class="nametable">';
                    echo '<h3>Danh sách người dùng</h3>';
                    echo '</div>';
                    echo '<table>';
                    echo '<tbody id="list-table-body">';
                    echo '<tr>';
                    echo '<th class="ordinal-number-column">#</th>';
                    echo '<th>Email</th>';
                    echo '<th>Tên tài khoản</th>';
                    echo '<th>Mật khẩu</th>';
                    echo '<th>Họ và tên</th>';
                    echo '<th></th>';
                    echo '</tr>';

                    foreach($result as $row){
                        $count++;
                        echo '<tr id="'.$row['username'].'">';
                        echo '<td class="ordinal-number-column">'.$count.'</td>';
                        echo '<td class="user-email">'.$row['email'].'</td>';
                        echo '<td class="user-username">'.$row['username'].'</td>';
                        echo '<td class="user-password">'.$row['password'].'</td>';
                        echo '<td class="user-fullname">'.$row['lastname'].' '.$row['firstname'].'</td>';
                        echo '<td class="action">';
                        echo '<span><button class="edit-button" data-bs-toggle="modal" data-bs-target="#editUserModal" onclick="GetUpdateUser(\''.$row['username'].'\')"><i class="fa-solid fa-pen"></i> Sửa</button></span>';
                        echo '<span><button class="delete-button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Delete(\''.$row['username'].'\')"><i class="fa-solid fa-trash"></i> Xóa</button></span>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';

                }else{
                    $result = $this->imageModel->GetAllImage();

                    // echo '<div class="add-delete-buttons">';
                    // echo '<button class="add-button">Thêm</button>';
                    // echo '<button class="delete-all-button btn btn-primary" id="delete-all-button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: #e5dede; border: none; color:black;">Xóa tất cả</button>';
                    // echo '</div>';

                    echo '<div class="nametable">';
                    echo '<h3>Danh sách ảnh tải lên</h3>';
                    echo '</div>';
                    echo '<table>';
                    echo '<tbody id="list-table-body">';
                    echo '<tr>';
                    echo '<th class="ordinal-number-column">#</th>';
                    echo '<th>Ảnh</th>';
                    echo '<th>Tên</th>';
                    echo '<th>Tiêu đề</th>';
                    echo '<th>Mô tả</th>';
                    echo '<th>Ngày tải lên</th>';
                    echo '<th>Danh mục</th>';
                    echo '<th></th>';
                    echo '</tr>';

                    foreach($result as $row){
                        $count++;
                        $pathParts = explode('.',$row['path']);
                        echo '<tr id="'.$pathParts[0].'">';
                        echo '<td class="ordinal-number-column">'.$count.'</td>';
                        echo '<td class="image"><img src="/Public/img/'. $row['path'].'" alt=""></td>';
                        echo '<td>'.$row['path'].'</td>';
                        echo '<td class="image-title">'.$row['title'].'</td>';
                        echo '<td class="image-description">'.$row['description'].'</td>';
                        echo '<td>'.$row['dateuploaded'].'</td>';
                        echo '<td class="image-category">'.$row['category'].'</td>';
                        echo '<td class="action">';
                        echo '<span><button class="edit-button" data-bs-toggle="modal" data-bs-target="#editImageModal" onclick="GetUpdateImage(\''.$row['path'].'\')"><i class="fa-solid fa-pen"></i> Sửa</button></span>';
                        echo '<span><button class="delete-button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Delete(\''.$row['path'].'\')"><i class="fa-solid fa-trash"></i> Xóa</button></span>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                }

            }else{
                echo 'ko nhan đc';
            }
            // echo 'nhan';

        }

        public function GetImage(){
            if(isset($_GET['pid'])){
                $pid = $_GET['pid'];
                $result = $this -> imageModel->GetImage($pid);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    $imageTitle = $row['title'];
                    $imageDescription = $row['description'];
                    $imageCategory = $row['category'];
                    $data = [
                        'Title'=>$imageTitle,
                        'Category'=>$imageCategory,
                        'Description'=>$imageDescription
                    ];
                    echo json_encode($data);
                }else{
                    echo 'Ko tìm thấy ảnh! '.$pid;
                }
            }else{
                echo 'Không tìm thấy ảnh!';
            }
        }

        public function UpdateImage(){
            if(isset($_GET['imgId'])){
                $pid = $_GET['imgId'];
                $imageTitle = trim($_POST['image-title']);
                $imageCategory = trim($_POST['image-category']);
                $imageDescription = trim($_POST['image-description']);

                if(strlen($imageTitle) < 3){
                    echo 'title empty';
                }else{
                    $this->imageModel->UpdateImage($pid, $imageTitle, $imageDescription, $imageCategory);
                    echo 'update success';
                }
            }else{
                echo 'Không tìm thấy ảnh!';
            }
        }

        public function GetUser(){
            if(isset($_GET['uId'])){
                $uId = $_GET['uId'];
                $result = $this->userModel->GetUser($uId);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    $data = [
                        'Email' => $row['email'],
                        'Username' => $row['username'],
                        'Password' => $row['password'],
                        'Lastname' => $row['lastname'],
                        'Firstname' => $row['firstname']
                    ];
                    echo json_encode($data);
                }else{
                    echo 'Ko tìm thấy người dùn! '.$uId;
                }
            }else{
                echo 'Không tìm thấy người dùng!';
            }
        }

        public function UpdateUser(){
            if(isset($_GET['uId'])){
                $username = $_GET['uId'];
                $email = trim($_POST['email']);
                $newUsername = trim($_POST['username']);
                $password = trim($_POST['password']);
                $lastname = trim($_POST['lastname']);
                $firstname = trim($_POST['firstname']);

                    $sql = "UPDATE users 
                            SET email = '$email', username ='$newUsername', password='$password', firstname = '$firstname', lastname = '$lastname'  
                            WHERE username = '$username'; ";
                    $this->userModel->DoQuery($sql);
                    echo "update success";
            }else{
                echo 'Không tìm thấy ảnh!';
            }
        }
        
        public function DeleteImage(){
            if(isset($_GET['pid'])){
                $pid = $_GET['pid'];
                $this->imageModel->DeleteImage($pid);
                echo 'delete success';
            }else{
                echo 'Không tìm thấy ảnh!';
            }
        }

        public function DeleteAllImage(){
            $this->imageModel->DeleteAllImages();
        }

        public function DeleteUser(){
            if(isset($_GET['uname'])){
                $uname = $_GET['uname'];
                $this->userModel->DeleteUser($uname);
                echo 'delete success';
            }else{
                echo 'Không tìm thấy người dùng!';
            }
        }
        
    }
?>