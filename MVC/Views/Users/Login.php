<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginT</title>
    <link rel="stylesheet" href="Public/css/LoginRegister.css">

    <script>
        function submitLoginData(){
            var xhr = new XMLHttpRequest();
            var formData = new FormData(document.getElementById('loginForm'));
            xhr.open('POST', 'index.php?controller=User&action=login', true);
            var alertP = document.getElementById('alertP');
            event.preventDefault();
            xhr.onreadystatechange = function(){
                if(xhr.status === 200){
                    if(xhr.responseText.trim() === 'success'){
                        window.location.href = 'index.php?controller=HomePage&action=MainPage';
                    }else{
                        console.log(xhr.responseText);
                        // alert(xhr.responseText);
                        alertP.innerHTML = xhr.responseText;
                        // alertP.style.display = "block";
                        
                    }
                }else{
                    alert('Đã xảy ra lỗi! Hãy thử lại.');
                }
            }
            xhr.send(formData);
        }
        
        
    </script>
   
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
                            
                <p class="not-have-account">Chưa có tài khoản? <a href="Register.php" class="switch" id="switch-to-sign-up">Đăng ký</a></p>
            </form>
        </div>
    </div>
    <script>
        function AlertDisapear() {
            
            var alertP = document.getElementById('alertP');
            alertP.innerHTML = "";
        };
        document.getElementById('username').addEventListener('click', AlertDisapear);
        document.getElementById('password').addEventListener('click', AlertDisapear);
        
        //document.getElementById('password').addEventListener("click", AlertDisapear);
    </script>
</body>
</html>