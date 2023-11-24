<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Public/css/LoginRegister.css">

</head>
<body>
<div class="container">
        <div class="form-box sign-up-form" id="sign-up-form">
            <h1>Đăng ký</h1>
            <div id="alertP"></div>
            <form action="#" method="post" id="registerForm">
                
                    <input type="email" name="email" id="email" placeholder="Email" required>

                    <input type="text" name="lastname" id="lastname" placeholder="Họ" required>

                    <input type="text" name="firstname" id="firstname" placeholder="Tên" required>
             
                    <input type="text" name="username" id="username" placeholder="Tên tài khoản" required>
                
                    <input type="password" name="password" id="password" placeholder="Mật khẩu" required>

                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Xác nhận mật khẩu" required>
            
                <label for=""><input type="checkbox" class="checkbox"> <span>Tôi đồng ý với các</span> <a href="#">Điều khoản & Chính sách</a></label> 
                
                <button type="submit" name="submit" onclick="submitRegisterData()">Đăng ký</button>
                <p class="not-have-account">Đã có tài khoản? <a href="index.php?controller=HomePage&action=Login" class="switch" id="switch-to-login">Đăng nhập</a></p>
            </form>
        </div>
    </div>
    <script src="Public/js/Register.js"></script>
</body>
</html>