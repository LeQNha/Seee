var saveChangeProfile = document.getElementById('save-change-profile');
var saveChangeAccount = document.getElementById('save-change-account');
var editProfileForm = document.getElementById('edit-profile-form');
var editAccountForm = document.getElementById('edit-account-form');
var headerAvatars = document.querySelectorAll('.user-avatar-container img');

//EDIT ACCOUNT
var username = document.getElementById('username');
var password = document.getElementById('password');
var confirmpassword = document.getElementById('confirmpassword');

//NAVIGATE
var abc = document.querySelector('.edit-file');
var edf = document.querySelector('.edit-acc');

window.onload = function(){
    abc.click();
    ObserseNavigateButton();
}

editProfileForm.addEventListener('submit', function(){
    var xhr = new XMLHttpRequest();
    formData = new FormData(editProfileForm);
    xhr.open('POST','/index.php?controller=EditProfile&action=SaveChangeProfile',true);
        event.preventDefault();
        xhr.onload = function(){
            if(xhr.status == 200){
                if(xhr.responseText.trim() == "success"){

                    showAndHide('Thay đổi thành công!');
                    // window.location.href = "/index.php?controller=Imey&action=EditProfile";
                    ChangeHeaderAvatar();
                    
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

editAccountForm.addEventListener('submit', function(){
    var xhr = new XMLHttpRequest();
    
    formData = new FormData(editAccountForm);
    xhr.open('POST','/index.php?controller=EditProfile&action=SaveChangeAccount',true);
    event.preventDefault();
    xhr.onload = function(){
        if(xhr.status == 200){
            if(xhr.responseText.trim() == "success"){

                showAndHide('Thay đổi thành công!');
                // window.location.href = "/index.php?controller=Imey&action=EditProfile";
                document.getElementById('header-username').textContent =  document.getElementById('edit-account-username').value;
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

//CHANGE HEADER AVATAR
function ChangeHeaderAvatar(){
    var xhr = new XMLHttpRequest();
    xhr.open('POST','/index.php?controller=EditProfile&action=ChangeHeaderAvatar',true);
    event.preventDefault();
    xhr.onload = function(){
        if(xhr.status == 200){
            console.log(headerAvatars.length);
            headerAvatars.forEach(element => {
                element.src = '/Public/profileimg/'+xhr.responseText.trim();
            });
        }else{
            alert('Đã có lỗi xảy ra!');
        }
    }
    xhr.send();
}

//Hiện thông báo rồi ẩn
// function showAndHideEditProfile(msg){

//     var notifyMessage = document.querySelector('.notify-message');
//     var message = document.querySelector('.notify-message p');
  
//     message.textContent = msg;
//     notifyMessage.style.top = "91vh";
//     notifyMessage.style.opacity = "0.9";
  
//      setTimeout(function () {
//          notifyMessage.style.top = "100vh"; // Ẩn thẻ div sau khoảng thời gian
//          notifyMessage.style.opacity = "0.3";
//          if(msg.trim() == 'Thay đổi thành công!'){
//             // window.location.href = "/index.php?controller=Imey&action=EditProfile";
//          }
//        }, 1000); // Thời gian đếm ngược (đơn vị: mili giây)
// }

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

//ĐỔI TRẠNG THÁI NÚT NAVIGATE
var observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      // entry.target.classList.toggle("show", entry.isIntersecting);
      if(entry.isIntersecting){
        abc.classList.remove("focus1");
        edf.classList.add("focus2");
      }else{
        abc.classList.add("focus1");
        edf.classList.remove("focus2");
      }
    })
  },
  {
    threshold: 0.7,
  }
  
  );
function ObserseNavigateButton(){
    // observer.observe(document.getElementById('edit-profile'));
    observer.observe(document.getElementById('edit-account'));
}
