    
    <link rel="stylesheet" href="./Public/css/ImagesContainer.css">
    <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <!-- <link rel="stylesheet" href="./Public/css/ImagesContainer.css"> -->
    <div id="user-infor-side">
        <div class="banner">
            <div class="user-avatar-img-container">
                <img src="Public/profileimg/<?php echo $avatar;?>" alt="" id="user-avatar">
            </div>
            <h1 class="username"><?php echo $_SESSION['Login']['username'] ?></h1>
            <a id="go-to-edit-profile" href="index?controller=Imey&action=EditProfile">Chỉnh sửa thông tin <i class="fa-solid fa-pen"></i></a>
            
            <div class="short-introduction">
                <div class="statistic">
                    <div class="number follower-number">
                        <span class="number-follower"><?php echo $data['BriefInformation']['FollowerNumber']; ?></span>
                        <span class="statistic-index">Người theo dõi</span>
                    </div>
                    <div class="number following-number">
                        <span class="number-following"><?php echo $data['BriefInformation']['FollowingNumber']; ?></span>
                        <span class="statistic-index">Đang theo dõi</span>
                    </div>
                    <div class="number uploaded-image-number">
                        <span id="number-uploaded-image"><?php echo $data['BriefInformation']['UploadedImageNumber']; ?></span>
                        <span class="statistic-index">Ảnh tải lên</span>
                    </div>
                </div>
                <div class="user-information">
                    <div>
                        <span>Email:</span>
                        <h4><?= $data['UserInformation']['Email']; ?></h4>
                    </div>
                    <div>
                        <span>Họ và tên:</span>
                        <h4><?= $data['UserInformation']['Lastname'].' '.$data['UserInformation']['Firstname'];; ?></h4>
                    </div>
                    <div>
                        <span>Nghề nghiệp:</span>
                        <h4><?= $data['UserInformation']['Ocupation']; ?></h4>
                    </div>
                    <div id="location">
                        <span>Vị trí:</span>
                        <h4><?= $data['UserInformation']['Location'];?></h4>
                    </div>
                </div>

                <span id="joinning-date">Tham gia vào <?= $data['UserInformation']['JoinningDate']; ?></span>
            </div>
        </div>
    </div>
  </div>

  <div id="list-side">
    <div class="liked-created-list">
        <ul>
            <li><i class="fa-solid fa-layer-group"></i></li>
            <li class="show-liked-list show-list-btn" onclick="ShowList('liked')">Yêu thích</li>
            <li class="show-created-list show-list-btn" onclick="ShowList('created')">Đã tải lên</li>
            <li class="show-followed-list show-list-btn" onclick="ShowList('following')">Theo dõi</li>
        </ul>

        <div id="sub-header">
            <div class="sub__search">
                <form >
                    <input type="text" class="search-small" placeholder= "Tìm kiếm">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </form>
            </div>
        </div>

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
                                                <a href="/index.php?controller=Imey&action=PublicUserPage&uploader=<?php echo $userFollowed['FollowedUsername'] ?>">
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
    
    
