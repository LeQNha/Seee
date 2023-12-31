<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-page</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/Public/css/AdminPageCss/AdminPage.css">
    <link rel="stylesheet" href="/Public/css/AdminPageCss/UserList.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<body>
    <div class="separate1"></div>

    <div id="header">
        <div id="logo">
            <img src="./Public/webimg/Imey-logo-1.png" alt="">
            
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
                        <i class='bx bxs-user-circle' ></i>
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
                <!-- <li>
                    <div class="more_nav">
                        <i class='bx bx-circle' ></i>
                        <h3 class="title_nav">Quản lý danh mục</h3>
                    </div>
                    <div class="separate"></div>
                </li>
                <li>
                    <div class="more_nav">
                        <i class='bx bxs-user-circle' ></i>
                        <h3 class="title_nav">Quản lý thành viên</h3>
                    </div>
                    <div class="separate"></div>
                </li> -->
            </ul>
        </div>
        <div id="list">
                
            <div class="maintable" id="main-table">
                <!-- <div class="add-delete-buttons">
                    <button class="add-button">Thêm</button>
                    <button class="delete-all-button btn btn-primary" id="delete-all-button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: #e5dede; border: none; color:black;">Xóa tất cả</button>
                </div> -->
                <input type="text" value="<?= $data['List'] ?>" id="management-list" hidden>
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

    <!-- modal -->
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" id="modal-delete-button" class="btn btn-primary" data-bs-dismiss="modal">Xóa</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Image modal -->
<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa thông tin ảnh</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="image-container">
            <img class="image" id="image" src="/Public/img/65222248e81a5.jpg" alt="">
        </div>
        <form action="#" method="post" id="image-infor-form">
          <div>
            <label for="image-title">Tiêu đề<span class="require">*</span></label>
            <input class="input-edit" type="text" name="image-title" id="image-title">
            <span class="error-message" id="image-title-error-messsage"></span>
          </div>
          <div>
            <label for="image-category">Danh mục</label>
            <div class="box-cate1" style="width: 100%;" onclick="toggleOptions3()">
              <input class="input-edit" type="text" name="image-category" id="image-category">
              <i class="fa-solid fa-caret-down down-click12"></i>
            </div>
            <div class="sub-cate1" style="width: 400px;">
                <?php
                  $count = 0;
                  foreach($data['Categories'] as $category){ ?>
                    <div class="sub-cate10" onclick="selectOption5(<?= ++$count; ?>)" style="margin: 0;width: 100%;"><?= $category['category']; ?></div>
                  <?php }
                ?>
                    
              <!-- <div class="sub-cate10" onclick="selectOption5(1)" style="margin: 0;width: 100%;">3D</div>
              <div class="sub-cate10" onclick="selectOption5(2)" style="margin: 0;width: 100%;">Quảng cáo</div>
              <div class="sub-cate10" onclick="selectOption5(3)" style="margin: 0;width: 100%;">Kiến trúc</div>
              <div class="sub-cate10" onclick="selectOption5(4)" style="margin: 0;width: 100%;">Anime</div>
              <div class="sub-cate10" onclick="selectOption5(5)" style="margin: 0;width: 100%;">Nhiếp ảnh</div>
              <div class="sub-cate10" onclick="selectOption5(6)" style="margin: 0;width: 100%;">Trừu tượng</div>
              <div class="sub-cate10" onclick="selectOption5(7)" style="margin: 0;width: 100%;">Khác</div> -->
            </div>
          </div>
          <div>
            <label for="image-description">Mô tả</label>
            <textarea class="input-edit" name="image-description" id="image-description"></textarea>
            <span class="error-message" id="image-description-error-messsage"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="modal-image-close-button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" id="modal-image-save-change-button" class="btn btn-primary">Lưu thay đổi</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit User modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa thông tin người dùng</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" id="user-infor-form">
            <div>
              <label for="email">Email<span class="require">*</span></label>
              <input type="email" name="email" id="email">
              <span class="error-message" id="email-error-message"></span>
            </div>
            <div>
              <label for="username">Tên tài khoản<span class="require">*</span></label>
              <input type="text" name="username" id="username">
              <span class="error-message" id="username-error-message"></span>
            </div>
            <div class="change-password">Thay đổi mật khẩu <i class="fa-solid fa-angle-down"></i></div> 
            <div class="change-password-input">
              <!-- <label for="password">Mật khẩu<span class="require">*</span></label>
              <input type="password" name="password" id="password">
              <span class="error-message" id="password-error-message"></span> -->
            </div>
            <div>
              <label for="lastname">Họ</label>
              <input type="text" name="lastname" id="lastname">
            </div>
            <div>
              <label for="firstname">Tên</label>
              <input type="text" name="firstname" id="firstname">
            </div>
            <div>
              <label for="introduction">Giới thiệu</label>
              <textarea name="introduction" id="introduction"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="modal-user-close-button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" id="modal-user-save-change-button" class="btn btn-primary">Lưu thay đổi</button>
      </div>
    </div>
  </div>
</div>

    <script src="/Public/js/AdminPageJs/AdminPage.js"></script>

    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
</body>
</html>