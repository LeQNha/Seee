function submitLoginData(){
    var xhr = new XMLHttpRequest();
    var formData = new FormData(document.getElementById('loginForm'));
    xhr.open('POST', '/index.php?controller=User&action=login', true);
    var alertP = document.getElementById('alertP');
    event.preventDefault();
    xhr.onreadystatechange = function(){
        if(xhr.status === 200){
            if(xhr.responseText.trim() === 'success'){
                window.location.href = '/index.php?controller=Imey&action=MainPage';
                // window.location.href = '/Imey/MainPage';
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

function AlertDisapear() {
            
    var alertP = document.getElementById('alertP');
    alertP.innerHTML = "";
};
document.getElementById('username').addEventListener('click', AlertDisapear);
document.getElementById('password').addEventListener('click', AlertDisapear);