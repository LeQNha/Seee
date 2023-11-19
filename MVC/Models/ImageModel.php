<?php
    class ImageModel extends BaseModel
    {
        const TABLE = "imageupload";

        public function DoQuery($sql){
            return $this -> Query($sql);
        }

        public function GetAllImage(){
            $sql = "SELECT * FROM imgupload";
            return $this -> Query($sql);
        }

        public function GetImage($pid = ''){
            $sql = "SELECT * FROM imgupload WHERE path = '$pid'";
            return $this->Query($sql);
        }

        public function GetImagesByCategory($category = ''){
            $username = $_SESSION['Login']['username'];
            $sql = "SELECT * FROM imgupload WHERE category = '$category' AND username <> '$username'";
            return $this->Query($sql);
        }

        public function DeleteImage($pid = ''){
            $sql = "DELETE FROM imgupload WHERE path = '$pid'";
            $this->Query($sql);
            
            //XÓA KHỎI FOLDER
            $file_path = "./Public/img/".$pid;
            // Kiểm tra nếu file tồn tại
            if (file_exists($file_path)) {
                // Xóa file
                if (unlink($file_path)) {
                    // echo "Đã xóa file thành công.";
                } else {
                    // echo "Không thể xóa file.";
                }
            } else {
                // echo "File không tồn tại.";
            }
        }

        public function DeleteAllImages(){
            $sql = "DELETE FROM imgupload";
            $this->Query($sql);

            //XÓA ALL ẢNH KHỎI FOLDER
            $folderPath = './Public/img'; // Đường dẫn tới thư mục

            // Lấy danh sách tất cả các tệp tin trong thư mục
            $fileList = glob($folderPath . '*');

            // Xóa từng tệp tin một
            foreach ($fileList as $filePath) {
                if (is_file($filePath)) {
                    unlink($filePath); // Xóa tệp tin
                }
            }
        }

        public function UpdateImage($pid = '', $detailTitleCreated = '', $descriptionCreated = '', $categoryCreated ='Khác'){
            $sql = "UPDATE imgupload
                SET title = '$detailTitleCreated', description = '$descriptionCreated', category = '$categoryCreated'  
                WHERE path = '$pid'";
            $this->DoQuery($sql);
        }
           
        
    }
?>