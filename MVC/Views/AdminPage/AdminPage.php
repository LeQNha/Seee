<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-page</title>
    <!-- boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Public/css/AdminPageCss/AdminPage.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<body>
    <div class="separate1"></div>

    <div id="header">
        <div id="logo">
            <h2>SEEE</h2>
            
        </div>
        <div id="main-header">
            <div class="header__search">
                <form >
                    <input type="text" class="example" placeholder= "Search now">
                    <i class='bx bx-search'></i>
                </form>
            </div>
            <div id="infor_user">
                <img src="https://i.pinimg.com/236x/03/47/d0/0347d06ed58f188e23dba4ebcd4acf0f.jpg" alt="" class="avatar">
                <h3 class="name_user">ABC</h3>
                <i class='bx bx-chevron-down'></i>
            </div>
        </div>

    </div>
    <div class="separate"></div>
    <div id="container">
        <div id="more">

            <ul>
                <li>
                    <div class="more_nav">
                        <i class='bx bxs-home'></i>
                        <h3 class="title_nav">Dashboard</h3>
                    </div>
                    <div class="separate"></div>
                </li>
                <li>
                <div class="more_nav" id="users-management">
                        <i class='bx bx-circle' ></i>
                        <h3 class="title_nav">Quản lý người dùng</h3>
                    </div>
                    <div class="separate"></div>
                </li>
                <li>
                    <div class="more_nav" id="images-management">
                        <i class='bx bx-circle' ></i>
                        <h3 class="title_nav">Quản lý ảnh</h3>
                    </div>
                    <div class="separate"></div>
                </li>
                <li>
                    <div class="more_nav">
                        <i class='bx bx-circle' ></i>
                        <h3 class="title_nav">Quản lý tin tức</h3>
                    </div>
                    <div class="separate"></div>
                </li>
                <li>
                    <div class="more_nav">
                        <i class='bx bxs-user-circle' ></i>
                        <h3 class="title_nav">Quản lý thành viên</h3>
                    </div>
                    <div class="separate"></div>
                </li>
            </ul>
        </div>
        <div id="list">
            <div class="maintable" id="main-table">
                <div>
                    <button>Thêm</button>
                    <button>Xóa tất cả</button>
                </div>

                <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-bs-expanded="false">
                    Dropdown button
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </div>

                <?php
                    if($data['List'] == 'UserList'){
                        include 'AdminPagePartitions/UserList.php';
                    }else{
                        include 'AdminPagePartitions/ImageList.php';
                    } 
                ?>
            </div>
            
        </div>

    </div>
    <script src="Public/js/AdminPageJs/AdminPage.js"></script>

    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
</body>
</html>