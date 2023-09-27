<?php
 class UserModel extends BaseModel
 {
    const TABLE = 'users';
    public function getAll($select = ['*'])
    {
       return $this->All(self::TABLE, $select);
    }
    public function DoQuery($sql){
        return $this -> Query($sql);
    }
 }
?>
