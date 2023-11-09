<?php
    class CommentModel extends BaseModel
    {
        const TABLE = "comments";

        public function DoQuery($sql){
            return $this -> Query($sql);
        }

        public function AddComment($commentContent = '', $username = '', $imagePath = ''){
            $sql = "INSERT INTO comments (comment_content, username, path) 
                    VALUES ('$commentContent','$username','$imagePath')";

            $this->Query($sql);
        }

        public function GetComments($pid = ''){
            $sql = "SELECT * FROM comments WHERE path = '$pid';";
            return $this->Query($sql);
        }
        
    }
?>