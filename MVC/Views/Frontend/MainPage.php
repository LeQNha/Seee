
    <div class="cover-div" id="cover-div"></div>
    <div class="container">
        <?php
            $query = "SELECT * FROM imgupload";
            $rows = mysqli_query($conn, $query);
            
            foreach($rows as $row){ ?>
                    <div class="paint" onclick="ShowDetails('<?php echo $row['path']; ?>')">
                        <p class="image-name"><?php echo $row['path'] ?></p>
                        <img src="Public/img/<?php echo $row["path"] ?> " width="350px" alt="">
                        <!-- <h3> <?php echo $row["title"]; ?> </h3> -->
                        
                    </div>
            <?php }
            ?>
    </div>
    <div class="show-details-container">
            <ul class="behavior-list">
                <li class=" close-show-details"><i class="fa-solid fa-xmark"></i></li>
                <li>
                    <img src="Public/webimg/defaultAvatar.png" alt="">
                    <span>Follow</span>
                </li>
                <li>
                    <i class="fa-regular fa-thumbs-up" id="like-button"></i>
                    <span>Yêu thích</span>
                </li>
                <li>
                    <i class="fa-regular fa-heart" id="save-button"></i>
                    <span>Lưu</span>
                </li>
            </ul>
        <div class="show-details">
                <div class="uploader">
                    <div class="detail-avatar-container">
                        <a href="#" onclick="ShowPublicUserPage()"><img class="detail-avatar" src="Public/webimg/defaultAvatar.png" alt=""></a>
                    </div>
                    <div>
                        <a href="#"><span class="detail-uploader">uploader</span></a>
                        <span>Follow</span>
                    </div>
                    <p class="detail-date-uploaded">111-111-111</p>
                </div>
                <div class="image-details">
                    <img class="detail-img" src="Public/img/64c215a858da0.png" alt="">
                    <h1 class="detail-title">tes</h1>
                    <p class="detail-description">ádadada</p>
                </div>
        </div>
    </div>
    
        

        