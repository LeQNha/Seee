<?php
    abstract class Database
    {
        const HOST = 'localhost';
        const USERNAME = 'root';
        const PASSWORD = '';
        CONST DB_NAME = 'dacs2';

        private $conn;

        public function Connect()
        {
            $conn = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DB_NAME);    

            mysqli_set_charset($conn, "utf8");
            
            if(mysqli_connect_errno() === 0){
                return $conn;
            }
            return false;
        }
        
    }
?>