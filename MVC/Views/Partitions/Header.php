
<header class="header">
        <!-- <div class="top-bar">
            <ul class="nav-bar">
                <a href="index.php?controller=HomePage&action=MainPage"><li><h2>Seee</h2></li></a>
                <li>Nổi bật</li>
                <li>Xếp hạng</li>
                <li>Sự kiện</li>
                <li>Cuộc thi</li>
            </ul>  
        </div> -->
        <div class="second-bar">
            <div class="header-bar bar-1">
                <a href="/index.php?controller=Imey&action=MainPage" id="logo"><img src="/Public/webimg/Imey-logo-1.png" alt=""></a>
                <!-- <a href="/Imey/MainPage" id="logo"><img src="/Public/webimg/Imey-logo-1.png" alt=""></a> -->
                <!-- <div class="nav-bar">
                    <a href="#">Nổi Bật</a>
                    <a href="#">Xếp Hạng</a>
                    <a href="#">Sự Kiện</a>
                    <a href="#">Cuộc Thi</a>
                </div> -->
            </div>
            <div class="header-bar bar-2">
                <form action="#" class="search-form">
                    <input type="search" name="searchBox" placeholder="Tìm kiếm" autocomplete="off" id="search-box" style="outline: none;" value="<?php if(isset($data['SearchQuery'])){ echo $data['SearchQuery'];} ?>">
                    <label for="search-box" class="fas-fa-search" id="search-icon"><i class="fa-solid fa-magnifying-glass"></i></label>        
                </form>
                <div class="button-container">
                    <a href="/index.php?controller=Imey&action=UploadImage" class="button button-createImg">Chia sẻ</a>
                    <!-- <a href="/Imey/UploadImage" class="button button-createImg">Chia sẻ</a> -->
                    <a href="/index.php?controller=Imey&action=PersonalPage&listShowed=saved" class="button button-Info">Trang cá nhân</a>
                    <!-- <a href="/Header/PersonalPage?listShowed=liked" class="button button-Info">Trang cá nhân</a> -->
                </div>
            </div>
            <ul class="header-bar account">
                    
                    <li><i class="fa-solid fa-envelope"></i></li>
                    <li><i class="fa-solid fa-bell"></i></li>
                    <?php
                        if($_SESSION['Login']['username']){ ?>
                            <li id="header-username" style="font-size: 22px; cursor: pointer;"> <?php echo $_SESSION['Login']['username']; ?> </li>
                            <li class="user-avatar-container"><img src="/Public/profileimg/<?php echo $avatar; ?>" alt="aa" class="avatar" onclick="ShowSubmenu()"></li>
                            <li class="show-submenu-button"><i class="fa-solid fa-angle-down"></i></li>
                        <?php }else{
                            echo '<script> alert("Chua dang nhap!"); </script>';
                            echo '<script> window.location.href = "/index.php?controller=HomePage"; </script>';
                        } 
                    ?>
                
            </ul>
            <div class="sub-menu" id="submenu">
                <div class="profile">
                    <div class="user-avatar-container">
                        <img src="/Public/profileimg/<?php echo $avatar; ?>" alt="avatar">
                    </div>
                    
                        <h2><?php echo $username; ?></h2> 
                        <h3><?php echo $email; ?></h3>
                
                </div>
                <ul>
                    
                    <a href="/index.php?controller=Imey&action=PersonalPage&listShowed=saved"><li>Trang cá nhân</li></a>
                    <a href="#"><li>Điều khoản và dịch vụ</li></a>
                    <a href="#"><li>Trợ giúp</li></a>
                    <a href="#"><li>Liên hệ</li></a>
                    <a href="EditProfile.php"><li>Cài đặt</li></a>
                    <hr>
                    <a href="/index.php?controller=Header&action=logOut"><li>Đăng xuất</li></a>
                </ul>
            </div> 
        </div>
            
</header>
    
