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
            $password = trim($_POST['password']);

            $select = ['username'=>$username, 'password'=>$password];
            
            if (empty($username) || empty($password)) {
                echo "Không được để trống!";
            }else{
                //chhi cần usrname vì username là duy nhấy
                $sql = "SELECT username, password, email, avatar FROM users WHERE username='$username'";
                $result = $this->FindUser($sql);
                if(mysqli_num_rows($result) == 1){
                    $row = $result->fetch_assoc();
                    
                    $hashedPasswordFromDatabase = trim($row['password']);
                    //Ktra mật khẩu khớp
                    if (password_verify($password, $hashedPasswordFromDatabase)) {
                        // Mật khẩu khớp
                        $_SESSION['Login']['username'] = $username;
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['avatar'] = $row['avatar'];
                        echo "success";
                    } else {
                        // Mật khẩu không khớp
                        echo "Sai mật khẩu!";
                    }

                }else{
                    echo "Tài khoản không tồn tại!";
                }
            }
        }

        public function Register(){
            $email = $_POST["email"];
            $username = $_POST["username"];
            $lastname = $_POST["lastname"];
            $firstname = $_POST["firstname"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirmpassword"];

            $data = ['email'=>$email, 'username'=>$username, 'password'=>$password];
            // $result = $this->userModel->addNewUser();

            // Kiểm tra xác nhận mật khẩu
                
            if(empty($email) || empty($username) || empty($password) || empty($confirmpassword)){
                echo "Không được để trống!";
            }else{
                //Mã hóa password
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);   

                $result = $this->FindUser("SELECT email, username FROM users  WHERE username='$username' OR email='$email'");
                if($password !== $confirmpassword){
                    echo "Xác nhận lại mật khẩu!";
                }else if(mysqli_num_rows($result) > 0){
                    echo "Tài khoản đã tồn tại";
                }else{
                    $this->userModel->DoQuery("INSERT INTO users (username, email, password, firstname, lastname, avatar) VALUES ('$username', '$email', '$hashedPassword','$firstname', '$lastname', 'userDefaultAvatar.png')");
                
                    echo "success";
                    $_SESSION['Login']['username'] = $username;
                    $_SESSION['email'] = $email;
                }
            }
            
            
        }

    }
?>