var saveButton = document.getElementById('save');

saveButton.addEventListener('click', function(){
    showAndHide();
    var xhr = new XMLHttpRequest();
    formData = new FormData(document.getElementById('edit-profile-form'));
    xhr.open('POST','/index.php?controller=EditProfile&action=Save',true);
    event.preventDefault();
    xhr.onload = function(){
        if(xhr.status == 200){
            if(xhr.responseText.trim() == "success"){

                showAndHide('Thay đổi thành công!');
                
            }else{
                // alert(xhr.responseText);
                showAndHide(xhr.responseText);
                
            }
        }else{
            // alert('Đã xảy ra lỗi! Hãy thử lại sau.');
            showAndHide(xhr.responseText);
        }
    }
    xhr.send(formData);
});

//Hiện thông báo rồi ẩn
function showAndHide(msg){
   var alertMessage = document.querySelector('.alert-message');
   var message = document.querySelector('.alert-message p');
   message.textContent = msg;
   alertMessage.style.top = "90vh";
   alertMessage.style.opacity = "1";

    setTimeout(function () {
        alertMessage.style.top = "100vh"; // Ẩn thẻ div sau khoảng thời gian
        alertMessage.style.opacity = "0.3";
        if(msg == 'Thay đổi thành công!'){
            window.location.href = "/index.php?controller=Imey&action=EditProfile";
        }
      }, 1000); // Thời gian đếm ngược (đơn vị: mili giây)
}

//Thay đổi avatar
var userAvatar = document.getElementById('user-avatar');
var changeAvatarButton = document.getElementById('change-avatar-btn');
var avatarInput = document.getElementById('avatar-file');
userAvatar.addEventListener('click', ChangeAvatar);
changeAvatarButton.addEventListener('click', ChangeAvatar);

function ChangeAvatar(){
    avatarInput.click();
}
avatarInput.addEventListener('change',function(e){
    var file = e.target.files[0];

    if(file){
        var fileReader = new FileReader();

        fileReader.onload = function(e){
            userAvatar.src = e.target.result;
        };

        fileReader.readAsDataURL(file);
    }
});

var abc = document.querySelector('.edit-file');
var edf = document.querySelector('.edit-acc');

abc.addEventListener('click', function() {
    abc.classList.add("focus1");
    edf.classList.remove("focus2");
});
edf.addEventListener('click', function() {
    abc.classList.remove("focus1");
    edf.classList.add("focus2");
});

// location
function toggleOptions() {
    var options = document.querySelector('.options');
    options.style.display = options.style.display === 'block' ? 'none' : 'block';
}
function selectOption(optionIndex) {
    var mainBox = document.querySelector('.location');
    var options = document.querySelectorAll('.option');
    options.forEach(function(option, index) {
        if (index === optionIndex - 1) {
          option.classList.add('selected');
        } else {
          option.classList.remove('selected');
        }
      });
    mainBox.value = options[optionIndex - 1].textContent;
    toggleOptions();
}