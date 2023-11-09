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
        <p class="number-follower"><?php echo $data['BriefInformation']['FollowerNumber']; ?> người theo dõi - <?php echo $data['BriefInformation']['FollowingNumber']; ?> đang theo dõi</p>
        <span><span id="uploaded-image-number"><?php echo $data['BriefInformation']['UploadedImageNumber']; ?></span> ảnh đã tải lên</span>
        <a href="index?controller=PersonalPage&action=EditProfile">Chỉnh sửa hồ sơ cá nhân</a>
    </div>

    
        <div class="liked-created-list">
        <ul>
            <li><i class="fa-solid fa-layer-group"></i></li>
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
    




    
.user-avatar 
.user-avatar 
#avatar-file{
    display: none;
}
.user-avatar i{
    position: absolute;
    cursor: pointer;
    font-size: 27px;
    background: white;
    box-shadow: 0px 0px 5px lightgray;
    padding: 5px;
    border-radius: 50%;
    top: 22vh;
    left: 160px;
}
.user-avatar img:hover,
.user-avatar i:hover{
    opacity: 0.8;
}
.short-introduction{
  margin-left: 380px;
  position: relative;
  margin-bottom: 70px;
}
.short-introduction h1{
  font-size: 40px;
  opacity: 0.8;
}
.short-introduction h3{
  position: absolute;
  font-size: 22px;
  font-weight: lighter;
  left: 300px;
  top: 10px
}
.short-introduction a{
    color: black;
    background: rgb(239, 235, 235);
    padding: 13px;
    border-radius: 20px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    position: absolute;
    top: 15px;
    left: 830px;
}
.short-introduction a:hover{
    background: lightgray;
}

.follow-list{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    
    flex-basis: calc(100% / 6);
   
}
.showed-list-button{
  border-bottom: 3px solid black;
  background: linear-gradient(to top, rgb(248, 246, 246), white);
  transition: all ease 0.2s;
}
.show-list-btn{
  cursor: pointer;
}
.show-list-btn:hover{
  background: linear-gradient(to top, rgb(248, 246, 246), white);
  border-bottom: 3px solid rgb(113, 111, 111);
  transition: all ease 0.1s;
}

  .followed-user{
    margin-top: 30px;
    width: calc(16.67% - 10px); /* Sử dụng calc để tính kích thước cố định cho mỗi phần tử */
    text-align: center;
    font-size: 18px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
  .followed-user-avatar-container{
    height: 120px;
    width: 120px;
    border-radius: 50%;
    overflow: hidden;
  }
  .followed-user-avatar-container img{
    height: 100%;
    width: 100%;
    object-fit: cover;
    object-position: center;
  }
  .followed-user span{
    color: black;
    font-weight: bold;  
  }
  .follower-number{
    font-size: 15px;
    font-weight: lighter;
  }

  .liked-created-list{
    margin-top: 120px;
    position: relative;
  }
  .liked-created-list ul{
    margin-left: 4%;
    width: 92%;

  }
  .liked-created-list ul li{
    color: black;
    font-size: 20px;
    opacity: 0.9;
    display: inline-block;
    padding: 10px;
  }

  #liked-created-images div.container{
    columns: 4;
    width: 1065px;
    column-gap: 30px;
    height: auto;
    margin: 30px auto;
    z-index: 3;
    position: relative;
  }


  #confirm-remove-image-modal-overlay{
    display: none;
    
    position: fixed;
    background: rgba(117, 113, 113, 0.5);
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 21;
}
#modal-show{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center; 
}
#confirm-remove-image-modal{
    width: 500px;
    height: 200px;
    border: 1px solid black;
    padding: 15px;
    box-shadow: 0px 0px 3px black;
    background: white;
    position: fixed;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
#confirm-remove-image-modal div{
  width: 95%;
  padding-left: 10px;
  padding-right: 10px;
}
#confirm-remove-image-modal-header{
 padding-top: 10px; 
 padding-bottom: 10px;
}
#confirm-remove-image-modal-header span{
  cursor: pointer;
  font-size: 25px;
  position: absolute;
  top: 2px;
  left: 460px;
 }
#confirm-remove-image-modal-body{
  border-top: 1px solid rgb(176, 172, 172);
  border-bottom: 1px solid rgb(176, 172, 172);
  padding-top: 15px;
  padding-bottom: 30px;
}
#confirm-remove-image-modal-body p{
  font-size: large;
}
#confirm-remove-image-modal-footer{
  margin-top: 20px;
  display: flex;
  justify-content: end;
}
#confirm-remove-image-modal-footer button{
  
  padding: 0px 30px;
  height: 35px;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
  font-size: 17px;
}
#remove-image-confirm-button{
  background: #007bff;
  color: white;
  margin-left: 10px;
}
#remove-image-cancel-button{
  background: lightgray;
  color: rgb(70, 65, 65);
}
