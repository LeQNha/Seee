<?php
 class CategoryModel extends BaseModel
 {
    const TABLE = 'categories';
    public function getAll($select = ['*'])
    {
       return $this->All(self::TABLE, $select);
    }

    public function AddCategory(){
        
    }

    public function GetAllCategory(){
      $sql = "SELECT * FROM categories";
      return $this->Query($sql);
    }

    public function GetCategory($categoryName = ''){
      $sql = "SELECT * FROM categories WHERE category = '$categoryName'";
      return $this->Query($sql);
    }
    
    public function DeleteCategory($categoryName = ''){
      $sql = "DELETE FROM categories WHERE category = '$categoryName'";
      $this->Query($sql);
    }

    public function DoQuery($sql){
        return $this -> Query($sql);
    }
 }
?>
