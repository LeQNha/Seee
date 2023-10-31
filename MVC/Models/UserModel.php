<?php
 class UserModel extends BaseModel
 {
    const TABLE = 'users';
    public function getAll($select = ['*'])
    {
       return $this->All(self::TABLE, $select);
    }
    public function GetAllUser(){
      $sql = "SELECT * FROM users";
      return $this->Query($sql);
    }
    public function DoQuery($sql){
        return $this -> Query($sql);
    }
 }
?>
