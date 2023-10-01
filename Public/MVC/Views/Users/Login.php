<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginT</title>
    <link rel="stylesheet" href="Public/css/LoginRegister.css">

</head>
<body>
    <div class="container">
        <div class="form-box login-form" id="login-form">
            <h1>Đăng nhập</h1>
            <div id="alertP"></div>
            <form  method="post" id="loginForm">
                <input type="text" name="username" id="username" placeholder="Tài khoản"  required>                
                <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
                        
                <a href="#" class="forgot-password"><p>Quên mật khẩu?</p></a>

                <button type="submit" name="submit" onclick="submitLoginData()">Đăng nhập</button>
                            
                <p class="not-have-account">Chưa có tài khoản? <a href="index?controller=HomePage&action=Register" class="switch" id="switch-to-sign-up">Đăng ký</a></p>
            </form>
        </div>
    </div>

    <script src="Public/js/Login.js"></script>
</body>
</html>