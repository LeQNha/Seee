
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="Public/css/MainPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
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
    
        <a href="#" class="scroll-up">
            <i class="fa-sharp fa-solid fa-angle-up"></i>
        </a>

        <script src="./Public/js/Script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>