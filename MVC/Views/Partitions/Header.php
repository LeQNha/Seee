
<header class="header">
        <!-- <div class="top-bar">
            <ul class="nav-bar">
                <a href="index.php?controller=HomePage&action=MainPage"><li><h2>Seee</h2></li></a>
                <li>About</li>
                <li>Rank</li>
                <li>Challenge</li>
                <li>Event</li>
            </ul>  
        </div> -->
        <div class="second-bar">
            <a href="index.php?controller=HomePage&action=MainPage" id="logo"><li><h2>Seee</h2></li></a>
            <form action="#" class="search-form">
                <input type="search" name="searchBox" placeholder="Tìm kiếm" autocomplete="off" id="search-box" style="outline: none;" value="<?php if(isset($data['SearchQuery'])){ echo $data['SearchQuery'];} ?>">
                <label for="search-box" class="fas-fa-search" id="search-icon"><i class="fa-solid fa-magnifying-glass"></i></label>        
            </form>
            <div class="button-container">
                <a href="index.php?controller=Header&action=UploadImage" class="button button-createImg">Tạo ảnh</a>
                <a href="index.php?controller=Header&action=PersonalPage&listShowed=liked" class="button button-Info">Trang cá nhân</a>
            </div>
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
            
</header>
    
