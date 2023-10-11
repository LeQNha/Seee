//trong PersonalPage show swipe followed
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

//hết
