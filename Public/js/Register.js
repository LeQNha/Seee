function submitRegisterData(){
    var xhr = new XMLHttpRequest();
    var formData = new FormData(document.getElementById('registerForm'));
    xhr.open('POST', 'index.php?controller=User&action=register', true);
    event.preventDefault();
    xhr.onload = function(){
        console.log(xhr.responseText);
        if(xhr.status === 200){
            if(xhr.responseText.trim() === 'success'){
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

function AlertDisapear() {
            
    var alertP = document.getElementById('alertP');
    alertP.innerHTML = "";
};
document.getElementById('email').addEventListener('click', AlertDisapear);
document.getElementById('username').addEventListener('click', AlertDisapear);
document.getElementById('password').addEventListener('click', AlertDisapear);
document.getElementById('confirmpassword').addEventListener('click', AlertDisapear);