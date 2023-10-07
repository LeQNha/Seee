
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
                    <a href="index.php?controller=Header&action=PersonalPage&listShowed=liked"><li>Trang cá nhân</li></a>
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
    
