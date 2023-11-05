<?php
    class AdminPageController extends BaseController
    {
        private $imageModel;
        private $userModel;
        function __construct()
        {
            $this->LoadModel("ImageModel");
            $this->imageModel = new ImageModel();
            
            $this->LoadModel("UserModel");
            $this->userModel = new UserModel();
            
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
        
            $data = [
                        'Result'=> $result,
                        'List'=> $list
                    ];

            $this->View('AdminPage.AdminPage', $data);
        }

        public function SwitchManagement(){
            $count = 0;
            if(isset($_GET['list'])){
                $list = $_GET['list'];
                if($list == 'UsersManagement'){
                    $result = $this->userModel->GetAllUser();
         
                    echo '<div class="add-delete-buttons">';
                    echo '<button class="add-button">Thêm</button>';
                    echo '<button class="delete-all-button btn btn-primary" id="delete-all-button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: #e5dede; border: none; color:black;">Xóa tất cả</button>';
                    echo '</div>';

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
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td>'.$row['username'].'</td>';
                        echo '<td>'.$row['password'].'</td>';
                        echo '<td>'.$row['lastname'].' '.$row['firstname'].'</td>';
                        echo '<td class="action">';
                        echo '<button class="edit-button"><i class="fa-solid fa-pen"></i> Sửa</button>';
                        echo '<button class="delete-button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Delete(\''.$row['username'].'\')"><i class="fa-solid fa-trash"></i> Xóa</button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';

                }else{
                    $result = $this->imageModel->GetAllImage();

                    echo '<div class="add-delete-buttons">';
                    echo '<button class="add-button">Thêm</button>';
                    echo '<button class="delete-all-button btn btn-primary" id="delete-all-button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: #e5dede; border: none; color:black;">Xóa tất cả</button>';
                    echo '</div>';

                    echo '<div class="nametable">';
                    echo '<h3>Danh sách ảnh tải lên</h3>';
                    echo '</div>';
                    echo '<table>';
                    echo '<tbody id="list-table-body">';
                    echo '<tr>';
                    echo '<th class="ordinal-number-column">#</th>';
                    echo '<th>Tên</th>';
                    echo '<th>Tiêu đề</th>';
                    echo '<th>Mô tả</th>';
                    echo '<th>Ngày tải lên</th>';
                    echo '<th></th>';
                    echo '</tr>';

                    foreach($result as $row){
                        $count++;
                        $pathParts = explode('.',$row['path']);
                        echo '<tr id="'.$pathParts[0].'">';
                        echo '<td class="ordinal-number-column">'.$count.'</td>';
                        echo '<td>'.$row['path'].'</td>';
                        echo '<td class="image-title">'.$row['title'].'</td>';
                        echo '<td class="image-description">'.$row['description'].'</td>';
                        echo '<td>'.$row['dateuploaded'].'</td>';
                        echo '<td class="action">';
                        echo '<button class="edit-button" data-bs-toggle="modal" data-bs-target="#editImageModal" onclick="GetUpdateImage(\''.$row['path'].'\')"><i class="fa-solid fa-pen"></i> Sửa</button>';
                        echo '<button class="delete-button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Delete(\''.$row['path'].'\')"><i class="fa-solid fa-trash"></i> Xóa</button>';
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
                    $data = [
                        'Title'=>$imageTitle,
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
                $imageDescription = trim($_POST['image-description']);

                if(strlen($imageTitle) < 3){
                    echo 'title empty';
                }else{
                    $this->imageModel->UpdateImage($pid, $imageTitle, $imageDescription);
                    echo 'update success';
                }
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