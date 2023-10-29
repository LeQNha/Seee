<!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script> -->


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
        <span><span id="uploaded-image-number"><?php echo $data['BriefInformation']['UploadedImageNumber']; ?></span> ảnh đã tải lên</span>
        <a href="index?controller=PersonalPage&action=EditProfile">Chỉnh sửa hồ sơ cá nhân</a>
    </div>

    
    <div class="liked-created-list">
        <ul>
            <li><i class="fa-solid fa-layer-group"></i></li>
            <!-- <a href="index.php?controller=Header&action=PersonalPage&listShowed=liked"><li class="show-liked-list">Yêu thích</li></a>
            <a href="index.php?controller=Header&action=PersonalPage&listShowed=created"><li class="show-created-list">Đã tạo</li></a>
            <a href="index.php?controller=Header&action=PersonalPage&listShowed=followed"><li class="show-followed-list">Theo dõi</li></a> -->
            <!-- <li onclick="GetShowList('liked')" class="showed-list-button show-liked-list">Yêu thích</li>
            <li onclick="GetShowList('created')" class="showed-list-button show-created-list">Đã tạo</li> -->

            <li class="show-liked-list show-list-btn" onclick="ShowList('liked')">Yêu thích</li>
            <li class="show-created-list show-list-btn" onclick="ShowList('created')">Đã tải lên</li>
            <li class="show-followed-list show-list-btn" onclick="ShowList('following')">Theo dõi</li>
            
        </ul>
        <div id="liked-created-images">
            <div id="show-list-text-content" hidden><?php echo $data['ListShowed'] ?></div>
            <?php 
                if($data['ListShowed'] == 'liked'){ ?>
                    <div class="container">
                        <?php
                            include './MVC/Views/Partitions/Paint.php'
                        ?>
                    </div>

               <?php }else if($data['ListShowed'] == 'created'){ ?>
                <div class="container">
                        <?php
                            include './MVC/Views/Partitions/Paint_Created.php';
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

    <div id="confirm-remove-image-modal-overlay">
        <div id="modal-show">
            <div id="confirm-remove-image-modal">
                <div id="confirm-remove-image-modal-header">
                    <h2>Xóa ảnh</h2>
                    <span class="close-confirm-remove-image-modal">&times;</span>
                </div>
                <div id="confirm-remove-image-modal-body">
                    <p>Xóa ảnh khỏi bộ sưu tập của bạn</p>
                </div>
                
                <div id="confirm-remove-image-modal-footer">
                    <button id="remove-image-cancel-button" class="close-confirm-remove-image-modal">Hủy</button>
                    <button id="remove-image-confirm-button">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    
    <?php include "./MVC/Views/Partitions/ShowDetailContainer.php"; ?>
    <?php include "./MVC/Views/Partitions/ShowDetailContainer_Created.php"; ?>
    
    
