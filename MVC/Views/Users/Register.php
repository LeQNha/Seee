<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Public/LoginRegister.css">

    <script>
        function submitRegisterData(){
            var xhr = new XMLHttpRequest();
            var formData = new FormData(document.getElementById('registerForm'));
            xhr.open('POST', 'index.php?controller=User&action=register', true);
            event.preventDefault();
            xhr.onload = function(){
                console.log(xhr.responseText);
                if(xhr.status === 200){
                    if(xhr.responseText === 'success'){
                        window.location.href = 'index.php?controller=HomePage&action=MainPage';
                    }else{
                        // alert(xhr.responseText);
                        alertP.innerHTML = xhr.responseText;
                    }
                }else{
                    alert('Đã xảy ra lỗi! Hãy thử lại.');
                }
            };
            xhr.send(formData);
        }
    </script>
</head>
<body>
<div class="container">
        <div class="form-box sign-up-form" id="sign-up-form">
            <h1>Đăng ký</h1>
            <div id="alertP"></div>
            <form action="#" method="post" id="registerForm">
                
                    <input type="email" name="email" id="email" placeholder="Email" required>
             
                    <input type="text" name="username" id="username" placeholder="Tên tài khoản" required>
                
                    <input type="password" name="password" id="password" placeholder="Mật khẩu" required>

                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Xác nhận mật khẩu" required>
            
                <label for=""><input type="checkbox" class="checkbox"> <span>Tôi đồng ý với các</span> <a href="#">Điều khoản & Chính sách</a></label> 
                
                <button type="submit" name="submit" onclick="submitRegisterData()">Đăng ký</button>
                <p class="not-have-account">Đã có tài khoản? <a href="/HomePage/Login" class="switch" id="switch-to-login">Đăng nhập</a></p>
            </form>
        </div>
    </div>

    <script>
        function AlertDisapear() {
            
            var alertP = document.getElementById('alertP');
            alertP.innerHTML = "";
        };
        document.getElementById('email').addEventListener('click', AlertDisapear);
        document.getElementById('username').addEventListener('click', AlertDisapear);
        document.getElementById('password').addEventListener('click', AlertDisapear);
        document.getElementById('confirmpassword').addEventListener('click', AlertDisapear);
        //document.getElementById('password').addEventListener("click", AlertDisapear);
    </script>
</body>
</html>