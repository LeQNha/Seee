
    <div id="contain">
        <div id="aside1">
            <div id="introduction">
                <div class="avatar-container">
                    <img src="./Public/profileimg/<?php echo $data['UploaderData']['uploaderAvatar']; ?>" alt="" class="image">
                </div>
                <h2 id="public-user"><?php echo $data['UploaderData']['uploader']; ?></h2>
                <span><?php echo $data['UploaderData']['uploaderFirstname']." ".$data['UploaderData']['uploaderLastname'] ?></span>
                <br>
                <span class="email"><?php echo $data['UploaderData']['uploaderEmail'] ?></span>
                <br><br>
                <span class="place"><?php echo $data['UploaderData']['uploaderLocation'] ?></span>
            </div>
            <div id="button">
                <button id="bt1" <?php if($data['FollowButtonContent'] == 'Hủy theo dõi'){ echo 'style="background-color: rgb(217, 222, 228); color: rgb(80, 78, 103);"'; } ?> ><?php echo $data['FollowButtonContent'] ?></button>
                <button id="bt2">Nhắn tin</button>
            </div>
            <div id="statistics">
                <div class="line">
                    <div class="name">
                        <h3>Ảnh đã tạo</h3>
                    </div>
                    <div class="number">
                        <p><?php echo $data['UploaderData']['ImageUploadNumber']; ?></p>
                    </div>
                    
                </div>
                <div class="line">
                    <div class="name">
                        <h3>Yêu thích</h3>
                    </div>
                    <div class="number">
                        <p><?php echo $data['UploaderData']['LikedImageNumber']; ?></p>
                    </div>
                    
                </div>
                <div class="line">
                    <div class="name">
                        <h3>Người theo dõi</h3>
                    </div>
                    <div class="number">
                        <p><?php echo $data['UploaderData']['FollowerNumber']; ?></p>
                    </div>
                    
                </div>
                <div class="line">
                    <div class="name">
                        <h3>Đang theo dõi</h3>
                    </div>
                    <div class="number">
                        <p><?php echo $data['UploaderData']['FollowingNumber']; ?></p>
                    </div>
                    
                </div>
            </div>
            <div class="self-introduction">
                <?php echo $introduction; ?>
            </div>
        </div>
        <div id="aside2">
                <div class="container">
                    <?php
                        $rows = $data['Rows'];
                        if($rows->num_rows != 0){
                            foreach($rows as $row){ ?>
                                    <div class="paint" onclick="ShowDetails('<?php echo $row['path']; ?>')">
                                        <p class="image-name"><?php echo $row['path'] ?></p>
                                        <img class="main-image" src="Public/img/<?php echo $row["path"] ?> " width="350px" alt="" loading="lazy">
                                        <!-- <div class="image-uploader">
                                            <div class="image-uploader-avatar-container">
                                                <img src="./Public/profileimg/<?php echo $row['avatar'] ?>" alt="">
                                            </div>
                                            <span class="uploader-username"> <?php echo $row['username']; ?></span>
                                        </div> -->
                                        <h4 class="image-title"> <?php echo $row["title"]; ?> </h4>

                                            <?php
                                                $path = $row['path'];
                                                $sqll = "SELECT path FROM liked_images WHERE path = '$path'";
                                                $likeNumber = mysqli_num_rows(mysqli_query($conn, $sqll));
                                                $likeNumberFomatted = number_format($likeNumber,0,'',' ');
                                            ?>
                                        <i class="fa-solid fa-thumbs-up like-number"><span> <?php if($likeNumber<100000){ echo ' '.$likeNumberFomatted; }else{ echo ' 100 000+'; } ?></span></i>
                                    </div>
                            <?php } 
                        }else{
                            echo '<h2 style="opacity: 0.7;">Không tìm thấy kết quả</h2>';
                        }

                    ?>
                </div>
        </div>
    </div>
    <?php include "./MVC/Views/Partitions/ShowDetailContainer.php" ?>