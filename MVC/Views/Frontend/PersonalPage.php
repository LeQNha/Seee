
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
        <!-- <p class="user-job" style="color: grey;">st</p> -->
        <p class="number-follower"><?php echo $data['FollowerNumber'] ?> người theo dõi</p>
        <a href="index?controller=PersonalPage&action=EditProfile">Chỉnh sửa hồ sơ cá nhân</a>
    </div>

    <?php if(count($data['FollowList']) > 0){?> 
        <div class="follow-list">
                <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                        foreach($data['FollowList'] as $userFollowed){ ?>
                            <div class="swiper-slide">
                            <div class="followed-user">
                                <a href="index.php?controller=PublicUserPage&action=PublicUserPage&uploader=<?php echo $userFollowed['FollowedUsername'] ?>">
                                    <div class="followed-user-avatar-container">
                                        <img src="./Public/profileimg/<?php echo $userFollowed['FollowedAvatar'] ?>" alt="">
                                    </div>
                                    <span class="followed-user-username"> <?php echo $userFollowed['FollowedUsername']; ?> </span>
                                </a>
                                <p class="follower-number"><?php echo $userFollowed['FollowerNumber'] ?> người theo dõi</p>
                            </div>
                    </div>
                    <?php } ?> 
                        
                    
                    
                    <!-- <div class="swiper-slide">
                        <div class="followed-user">
                            <a href="#">
                                <div class="followed-user-avatar-container">
                                    <img src="./Public/webimg/defaultAvatar.png" alt="">
                                </div>
                                <span class="followed-user-username">name</span>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">Slide 3</div>
                    <div class="swiper-slide">Slide 4</div>
                    <div class="swiper-slide">Slide 5</div>
                    <div class="swiper-slide">Slide 6</div>
                    <div class="swiper-slide">Slide 7</div>
                    <div class="swiper-slide">Slide 8</div>
                    <div class="swiper-slide">Slide 9</div> -->
                </div>
                <div class="swiper-button-next" style="color: black;"></div>
                <div class="swiper-button-prev" style="color: black;"></div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
        </div>
    <?php } ?>

    <div class="liked-created-list">
        <ul>
            <li><i class="fa-solid fa-layer-group"></i></li>
            <a href="index.php?controller=Header&action=PersonalPage&listShowed=liked"><li class="show-liked-list">Yêu thích</li></a>
            <a href="index.php?controller=Header&action=PersonalPage&listShowed=created"><li class="show-created-list">Đã tạo</li></a>
            <!-- <li onclick="GetShowList('liked')" class="showed-list-button show-liked-list">Yêu thích</li>
            <li onclick="GetShowList('created')" class="showed-list-button show-created-list">Đã tạo</li> -->
            
        </ul>
        <div id="liked-created-images">
            <div id="show-list-text-content" hidden><?php echo $data['ListShowed'] ?></div>
            <?php 
                include "./MVC/Views/Partitions/ImagesContainer.php"; 
            ?>
        </div>
    </div>
    
    <?php include "./MVC/Views/Partitions/ShowDetailContainer.php"; ?>

    <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
   <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 5,
      spaceBetween: 30,
      loop: false,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

    
