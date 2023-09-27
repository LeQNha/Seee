<?php
 class UserModel extends BaseModel
 {
    const TABLE = 'users';
    public function getAll($select = ['*'])
    {
       return $this->All(self::TABLE, $select);
    }

    public function FindUser($sql)
    {
        return $this->Query($sql);
    }
    public function AddNewUser($sql){
        return $this->Query($sql);
    }
 }
?>
