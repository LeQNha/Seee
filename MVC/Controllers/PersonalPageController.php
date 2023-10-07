<?php
    class PersonalPageController extends BaseController
    {
        private $userModel;
        private $imageModel;
        function __construct()
        {
            $this->LoadModel('ImageModel');
            $this->imageModel = new ImageModel();

            $this->LoadModel('UserModel');
            $this->userModel = new UserModel();
        }
        public function EditProfile()
        {   
            $username = $_SESSION['Login']['username'];
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $this->userModel->DoQuery($sql);

            $email = "";
            $username = "";
            $password = "";
            $firstname = "";
            $lastname = "";
            $ocupation = "";
            $location = "";
            $introduction = "";
            $avatar = "";
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();

                $email = trim($row['email']) ;
                $username = trim($row['username']);
                $password = trim($row['password']);
                $firstname = trim($row['firstname']);
                $lastname = trim($row['lastname']);
                $ocupation = trim($row['ocupation']);
                $location = trim($row['location']);
                $introduction = trim($row['introduction']);
                $avatar = trim($row['avatar']);
            }
            
            $userData = [
                'Email'=>$email,
                'Username'=>$username,
                'Password'=>$password,
                'Firstname'=>$firstname,
                'Lastname'=>$lastname,
                'Ocupation'=>$ocupation,
                'Location'=>$location,
                'Introduction'=>$introduction,
                'Avatar'=>$avatar,
            ];
            $data = [
                'Page'=>'EditProfile',
                'UserData'=>$userData
            ];
            $this->View('Layout.MasterLayout', $data);
        }
    }
?>