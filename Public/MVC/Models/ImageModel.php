<?php
    class ImageModel extends BaseModel
    {
        const TABLE = "imageupload";

        public function DoQuery($sql){
            return $this -> Query($sql);
        }
    }
?>