<?php
    class BaseModel extends Database
    {
        protected $conn;
        public function __construct()
        {
           $this->conn = $this->connect();
        }
        
        public function All($table, $select = ['*'])
        {

            $columns = implode(',', $select);
            echo $columns;
            $sql = "SELECT $columns FROM $table";
            $data = [];
            // die($table);
            $query = $this->query($sql);
            while($row = mysqli_fetch_assoc($query)){
                array_push($data, $row);
            }
            return $data;
        }
        public function Get($table, $conditions)
        {
            $sql = "SELECT * FROM $table $conditions ";

        }
        public function Find($sql)
        {
            // $columns = implode(',',array_keys($select));
            // $sql = "SELECT $columns FROM $table $conditions;";
            $query = $this->Query($sql);
            return $query;
        }

        public function Add($table, $data = [])
        {
            
        }

        function Query($sql)
        {
            return mysqli_query($this->conn, $sql);
        }
    }
?>