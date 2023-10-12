<?php
    class UserController extends BaseController
    {
        private $userModel;
        public function __construct()
        {
            $this->loadModel('UserModel');
            $this->userModel = new UserModel();
        }
        public function index(){
            
        }

        public function ShowAll()
        {
            $users = $this->userModel->getAll(['email', 'username', 'password']);

            echo "<pre>";
            print_r($users);
            echo "</pre>";
        }
        public function FindUser($sql){

            $user = $this->userModel->DoQuery($sql);
            return $user;
        }

        public function Login(){
            

            $username = $_POST['username'];
            $password = $_POST['password'];

            $username = $_POST["username"];
            $password = $_POST["password"];

            $select = ['username'=>$username, 'password'=>$password];
            

            if (empty($username) || empty($password)) {
                // $response = array('status' => 'empty');
                // header('Content-Type: application/json');
                // echo json_encode($response);
                echo "Không được để trống!";
            }else{
                $sql = "SELECT username, password, email FROM users WHERE username='$username' AND password='$password'";
                $result = $this->FindUser($sql);
                if(mysqli_num_rows($result) == 1){
                    echo "success";
                    $_SESSION['Login']['username'] = $username;
                    $row = $result->fetch_assoc();
                    $_SESSION['email'] = $row['email'];
                }else{
                    echo "Sai tài khoản hoặc mật khẩu!";
                }
            }
        }

        public function Register(){
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirmpassword"];

            $data = ['email'=>$email, 'username'=>$username, 'password'=>$password];
            // $result = $this->userModel->addNewUser();

            // Kiểm tra xác nhận mật khẩu
            
                
            if(empty($email) || empty($username) || empty($password) || empty($confirmpassword)){
                echo "Không được để trống!";
            }else{
                $result = $this->FindUser("SELECT email, username FROM users  WHERE username='$username' OR email='$email'");
                if($password !== $confirmpassword){
                    echo "Xác nhận lại mật khẩu!";
                }else if(mysqli_num_rows($result) > 0){
                    echo "Tài khoản đã tồn tại";
                }else{
                    $this->userModel->DoQuery("INSERT INTO users (username, email, password, avatar) VALUES ('$username', '$email', '$password','userDefaultAvatar.png')");
                
                    echo "success";
                    $_SESSION['Login']['username'] = $username;
                    $_SESSION['email'] = $email;
                }
            }
            
            
        }

    }
?>