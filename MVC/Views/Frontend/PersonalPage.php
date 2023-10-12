
<link rel="stylesheet" href="./Public/css/ImagesContainer.css">
    <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <!-- <link rel="stylesheet" href="./Public/css/ImagesContainer.css"> -->
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
        <h3><?php echo $_SESSION['email'] ?></h3>
        <!-- <p class="user-job" style="color: grey;">st</p> -->
        <p class="number-follower"><?php echo $data['BriefInformation']['FollowerNumber']; ?> người theo dõi - <?php echo $data['BriefInformation']['FollowingNumber']; ?> đang theo dõi</p>
        <p><?php echo $data['BriefInformation']['LikedImageNumber']; ?> ảnh đã tải lên</p>
        <a href="index?controller=PersonalPage&action=EditProfile">Chỉnh sửa hồ sơ cá nhân</a>
    </div>

    
    <div class="liked-created-list">
        <ul>
            <li><i class="fa-solid fa-layer-group"></i></li>
            <a href="index.php?controller=Header&action=PersonalPage&listShowed=liked"><li class="show-liked-list">Yêu thích</li></a>
            <a href="index.php?controller=Header&action=PersonalPage&listShowed=created"><li class="show-created-list">Đã tạo</li></a>
            <a href="index.php?controller=Header&action=PersonalPage&listShowed=followed"><li class="show-followed-list">Theo dõi</li></a>
            <!-- <li onclick="GetShowList('liked')" class="showed-list-button show-liked-list">Yêu thích</li>
            <li onclick="GetShowList('created')" class="showed-list-button show-created-list">Đã tạo</li> -->

            <!-- <li class="show-liked-list" onclick="ShowList('liked')">Yêu thích</li>
            <li class="show-created-list" onclick="ShowList('created')">Đã tạo</li>
            <li class="show-followed-list" onclick="ShowList('followed')">Theo dõi</li> -->
            
        </ul>
        <div id="liked-created-images">
            <div id="show-list-text-content" hidden><?php echo $data['ListShowed'] ?></div>
            <?php 
                if($data['ListShowed'] != 'followed'){ ?>

                    <div class="container">
                        <?php
                            $rows = $data['Rows'];
                            
                            foreach($rows as $row){ ?>
                                    <div class="paint" onclick="ShowDetails('<?php echo $row['path']; ?>')">
                                        <p class="image-name"><?php echo $row['path'] ?></p>
                                        <img src="Public/img/<?php echo $row["path"] ?> " width="350px" alt="" loading="lazy">
                                        <!-- <h3> <?php echo $row["title"]; ?> </h3> -->
                                        
                                    </div>
                            <?php }
                        ?>
                    </div>

               <?php }else{ 
                    if(count($data['FollowList']) > 0){?> 
                        <div class="follow-list">
                                
                                    <?php
                                        foreach($data['FollowList'] as $userFollowed){ ?>
                                            <div class="followed-user">
                                                <a href="index.php?controller=PublicUserPage&action=PublicUserPage&uploader=<?php echo $userFollowed['FollowedUsername'] ?>">
                                                    <div class="followed-user-avatar-container">
                                                        <img src="./Public/profileimg/<?php echo $userFollowed['FollowedAvatar'] ?>" alt="">
                                                    </div>
                                                    <span class="followed-user-username"> <?php echo $userFollowed['FollowedUsername']; ?> </span>
                                                </a>
                                                <p class="follower-number"><?php echo $userFollowed['FollowerNumber'] ?> người theo dõi</p>
                                            </div>
                                        
                                    <?php } ?> 
                            
                        </div>
                    <?php } ?>

                <?php } 
                ?>
        </div>
    </div>
    
    <?php include "./MVC/Views/Partitions/ShowDetailContainer.php"; ?>
