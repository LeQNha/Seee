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
<header class="header">
        <div class="top-bar">
            <ul class="nav-bar">
                <a href="index.php?controller=HomePage&action=MainPage"><li><h2>Seee</h2></li></a>
                <li>About</li>
                <li>Rank</li>
                <li>Challenge</li>
                <li>Event</li>
            </ul>
            <ul class="account">
                    
                    <li><i class="fa-solid fa-bell"></i></li>
                    <li style="font-size: 22px; cursor: pointer;" onclick="ShowSubmenu()"> <?php echo $_SESSION['Login']['username']; ?> </li>
                    <li class="user-avatar-container"><img src="Public/profileimg/<?php echo $avatar; ?>" alt="aa" class="avatar" onclick="ShowSubmenu()"></li>
                    <li><i class="fa-solid fa-angle-down"></i><li></li>
                
            </ul>
            <div class="sub-menu" id="submenu">
                <div class="profile">
                    <div class="user-avatar-container">
                        <img src="Public/profileimg/<?php echo $avatar; ?>" alt="avatar">
                    </div>
                    
                        <h2><?php echo $username; ?></h2> 
                        <h3><?php echo $email; ?></h3>
                
                </div>
                <ul>
                    <a href="EditProfile.php"><li>Cài đặt</li></a>
                    <a href="index.php?controller=Header&action="><li>Trang cá nhân</li></a>
                    <hr>
                    <a href="index.php?controller=Header&action=logOut"><li>Đăng xuất</li></a>
                </ul>
            </div>   
        </div>
        <div class="second-bar">
            <form action="" class="search-form">
                <input type="search" name="" placeholder="Tìm kiếm" autocomplete="off" id="search-box" style="outline: none;">
                <label for="search-box" class="fas-fa-search"><i class="fa-solid fa-magnifying-glass"></i></label>         
            </form>
            <a href="index.php?controller=Header&action=UploadImage">Tạo ảnh</a>
            <a href="#">Bộ sưu tập</a>
        </div>
    </header>
    
