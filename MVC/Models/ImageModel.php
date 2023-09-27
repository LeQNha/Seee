<?php
    class ImageModel extends BaseModel
    {
        const TABLE = "imageupload";

        public function GetAll($sql)
        {
           return $this->Query($sql);
        }
        public function GetImage($sql)
        {
            return $this->Query($sql);
        }
    }
?>