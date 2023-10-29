<link rel="stylesheet" href="./Public/css/Paint_Created.css">
<?php
            $rows = $data['Rows'];
            if($rows->num_rows != 0){
                foreach($rows as $row){ ?>
                        <div class="paint" id="<?php echo $row['path']; ?>" onclick="ShowDetails_Created('<?php echo $row['path']; ?>')">
                            <!-- <p class="image-name"><?php echo $row['path'] ?></p> -->
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