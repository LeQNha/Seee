<?php
    class MainPageController extends BaseController
    {
        private $imageModel;
        function __construct()
        {
            $this->loadModel("ImageModel");
            $this->imageModel = new ImageModel();
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

        public function PublicUserPage()
        {
            $uploader = "â";
            $uploaderAvatar = "";
        if(isset($_GET['uploader'])){
            $uploader = $_GET['uploader'];

            $sql = "SELECT * FROM users INNER JOIN imgupload ON users.username = imgupload.username WHERE users.username = '$uploader'";
            $result = $this->imageModel->DoQuery($sql);

            $sql = "SELECT * FROM imgupload WHERE username = '$uploader'";
            $rows = $this->imageModel->DoQuery($sql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $uploaderEmail = $row['email'];
                $uploaderFirstname = $row['firstname'];
                $uploaderLastname = $row['lastname'];
                $uploaderOcupation = $row['ocupation'];
                $uploaderLocation = $row['location'];
                $uploaderIntroduction = $row['introduction'];
                $uploaderAvatar = $row['avatar'];
            }
            
        }else{
            $uploader = "ko co";
        }

        $data = [
            "Page"=>"PublicUserPage",
            "UploaderData"=>[
                "uploader"=>$uploader,
                "uploaderEmail"=>$uploaderEmail,
                "uploaderFirstname"=>$uploaderFirstname,
                "uploaderLastname"=>$uploaderLastname,
                "uploaderOcupation"=>$uploaderOcupation,
                "uploaderLocation"=>$uploaderLocation,
                "uploaderIntroduction"=>$uploaderIntroduction,
                "uploaderAvatar"=>$uploaderAvatar
            ],
            "Rows"=>$rows
            
        ];

        $this->View('Layout.MasterLayout', $data);
        
        }
    }
?>