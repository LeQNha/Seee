
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
                <!-- <button id="bt2">Message</button> -->
            </div>
            <div id="statistics">
                <div class="line">
                    <div class="name">
                        <h3>Project Views</h3>
                    </div>
                    <div class="number">
                        <p>539,381</p>
                    </div>
                    
                </div>
                <div class="line">
                    <div class="name">
                        <h3>Appreciations</h3>
                    </div>
                    <div class="number">
                        <p>32,150</p>
                    </div>
                    
                </div>
                <div class="line">
                    <div class="name">
                        <h3>Followers</h3>
                    </div>
                    <div class="number">
                        <p>11,163</p>
                    </div>
                    
                </div>
                <div class="line">
                    <div class="name">
                        <h3>Following</h3>
                    </div>
                    <div class="number">
                        <p>338</p>
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
                    foreach($data['Rows'] as $row){ ?>
                        <div class="paint" onclick="ShowDetails('<?php echo $row['path']; ?>')">
                            <p class="image-name"><?php echo $row['path'] ?></p>
                            <img src="./Public/img/<?php echo $row["path"] ?> " width="350px" alt="">
                            <!-- <h3> <?php echo $row["title"]; ?> </h3> -->
                        </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <?php include "./MVC/Views/Partitions/ShowDetailContainer.php" ?>