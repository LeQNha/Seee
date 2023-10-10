<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/css/HomePage.css">
    <link rel="stylesheet" href="./Public/css/Footer.css">
    <title>HomePage</title>
</head>
<body>
    <header>
        <img class="logo" src="./webimg/Logo-Flippy-Book-3.png" alt="">
        <ul>
            <li>Giới thiệu</li>
            <li>Liên lạc</li>
            <a class="dndk loginBtn" href="index.php?controller=HomePage&action=Login"><li >Đăng nhập</li></a>
            <a class="dndk registerBtn" href="index.php?controller=HomePage&action=Register"><li>Đăng kí</li></a>
        </ul>
    </header>
    <main>
        <div class="main_homepage">
            <div class="main1">
                <p>Chào mừng đến với</p>
                <h1>Seee</h1>
                <h2>Không gian tâm hồn & xúc cảm</h2>
                <a class="open" href="index.php?controller=HomePage&action=Login"><button>Bắt đầu ngay</button></a>
            </div>
            <div class="main2">
                <img class="image_home2" src="https://vcdn-dulich.vnecdn.net/2020/01/08/sac-mau-cua-bien-vnexpress-1-6641-1578454676.jpg" alt="">
                <img class="image_home" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcgClmaTaA7qyI2KxNCn1oVn3RQhJG-jbkpkGNqATaQ3eeUords_w-hV1VNt15Jd3cRCE&usqp=CAU" alt="">
                <img class="image_home3" src="https://rgb.vn/wp-content/uploads/2016/05/nghe-thuat-chup-anh-mon-an-loi-cuon-06.jpg" alt="">
                <img class="image_home1" src="https://chupanhnoithat.vn/upload/images/saddww.jpg" alt="">
            </div>
        </div>
    </main>
    <div class="cloud"></div>
    <div class="cloud1"></div>
    <div class="cloud2"></div>
    <div class="cloud3"></div>
    <div class="cloud4"></div>
    <div class="cloud5"></div>
    <div class="cloud6"></div>
    <div class="cloud7"></div>
    <div class="cloud8"></div>
    <div class="cloud9"></div>

    <?php include './MVC/Views/Partitions/Footer.php'; ?>
</body>
</html>