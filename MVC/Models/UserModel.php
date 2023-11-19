<?php
 class UserModel extends BaseModel
 {
    const TABLE = 'users';
    public function getAll($select = ['*'])
    {
       return $this->All(self::TABLE, $select);
    }

    public function AddUser(){
      
    }

    public function GetAllUser(){
      $sql = "SELECT * FROM users";
      return $this->Query($sql);
    }

    public function GetUser($username = ''){
      $sql = "SELECT * FROM users WHERE username = '$username'";
      return $this->Query($sql);
    }
    public function GetUserAvatar( $username = ''){
      $sql = "SELECT avatar FROM users WHERE username = '$username'";
      $rs = $this->Query($sql);
      if($rs->num_rows > 0){
        $r = $rs->fetch_assoc();
        return $r['avatar'];
      }
    }

    public function DeleteUser($uname = ''){
      $sql = "DELETE FROM users WHERE username = '$uname'";
      $this->Query($sql);
    }

    public function DoQuery($sql){
        return $this -> Query($sql);
    }
 }
?>
