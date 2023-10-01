

    <div class="banner">
        <div class="user-avatar">
            <div class="user-avatar-img-container">
                <img src="Public/profileimg/<?php echo $avatar;?>" alt="" id="user-avatar">
            </div>
            <i class="fa-solid fa-camera" id="change-avatar-btn"></i>
            <input type="file" id="avatar-file">
        </div>
    </div>
    <div class="short-introduction">
        <h1 class="username"><?php echo $_SESSION['Login']['username'] ?></h1>
        <p class="user-job" style="color: grey;">st</p>
        <p class="number-follower">100 người theo dõi</p>
        <a href="index?controller=PersonalPage&action=EditProfile">Chỉnh sửa hồ sơ cá nhân</a>
    </div>
    
