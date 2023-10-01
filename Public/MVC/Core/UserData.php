<?php
    
    if(isset($_SESSION['Login']['username'])){
        $username = $_SESSION['Login']['username'];
    }
    $conn = mysqli_connect('localhost', 'root', '', 'dacs2');
    $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
        
            echo "<script> console.log('lai header'); </script>";
            // Truy cập vào dữ liệu
            $email = $row['email'];
            $username = $row['username'];
            $password = $row['password'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $ocupation = $row['ocupation'];
            $location = $row['location'];
            $introduction = $row['introduction'];
            $avatar = $row['avatar'];
        }

?>