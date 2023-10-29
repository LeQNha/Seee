<?php
    class ImageModel extends BaseModel
    {
        const TABLE = "imageupload";

        public function DoQuery($sql){
            return $this -> Query($sql);
        }

        public function RemoveImage($pid = ''){
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

        public function UpdateImage($pid = '', $detailTitleCreated = '', $descriptionCreated = ''){
            $sql = "UPDATE imgupload
                SET title = '$detailTitleCreated', description = '$descriptionCreated' 
                WHERE path = '$pid'";
            $this->DoQuery($sql);
        }
           
        
    }
?>