var usersManagementButton = document.getElementById('users-management');
var imagesManagementButton = document.getElementById('images-management');
var deleteAllButton = document.getElementById('delete-all-button');
var mainTable = document.getElementById('main-table');
var listTableBody = document.getElementById('list-table-body');

//ERROR MESS
var errorMessages = document.getElementsByClassName('error-message');

//MODAL DELETE
var modalBody = document.querySelector('.modal-body');
var modalTitle = document.querySelector('.modal-title');
var modalDeleteButton = document.getElementById('modal-delete-button');

//MODAL UPDATE IMG
var image = document.getElementById('image');
var imageTitle = document.getElementById('image-title');
var imageCategory = document.getElementById('image-category');
var imageDescription = document.getElementById('image-description');
var modalImageSaveChangeButton = document.getElementById('modal-image-save-change-button');
var modalImageCloseButton = document.getElementById('modal-image-close-button');
var updateImageId = '';

var imageTitleErrorMessage = document.getElementById('image-title-error-messsage');

//MODAL UPDATE USER
var userEmail = document.getElementById('email');
var userUsername = document.getElementById('username');
var userPassword = document.getElementById('password');
var userLastname = document.getElementById('lastname');
var userFirstname = document.getElementById('firstname');
updateUserId = '';
var modalUserCloseButton = document.getElementById('modal-user-close-button');
var modalUserSaveChangeButton = document.getElementById('modal-user-save-change-button');

var ml = document.getElementById('management-list').value;

var xhr = new XMLHttpRequest();

window.onload = function(){
    console.log(ml);
    if(ml == 'UserList'){
        usersManagementButton.classList.add('more_nav-clicked');
    }else{
        imagesManagementButton.classList.add('more_nav-clicked');
    }

    ChangeModalContent();
}

usersManagementButton.addEventListener('click', function(){
    imagesManagementButton.classList.remove('more_nav-clicked');
    usersManagementButton.classList.add('more_nav-clicked');
    xhr.open('GET','/index.php?controller=AdminPage&action=SwitchManagement&list=UsersManagement');
    xhr.onload = function(){
        if(xhr.status === 200){
            mainTable.innerHTML = xhr.responseText;
        }else{
            alert('Đã có lỗi xảy ra!');
        }
    }
    xhr.send();
    history.pushState(null,null,'/index.php?controller=AdminPage&list=UsersManagement');
    ml = 'UserList';
    ChangeModalContent();
});

imagesManagementButton.addEventListener('click', function(){
    usersManagementButton.classList.remove('more_nav-clicked');
    imagesManagementButton.classList.add('more_nav-clicked');
    xhr.open('GET','/index.php?controller=AdminPage&action=SwitchManagement&list=ImagesManagement');
    xhr.onload = function(){
        if(xhr.status === 200){
            mainTable.innerHTML = xhr.responseText;
        }else{
            alert('Đã có lỗi xảy ra!');
        }
    }
    xhr.send();
    history.pushState(null,null,'/index.php?controller=AdminPage&list=ImagesManagement');
    ml = 'ImageList';
    ChangeModalContent();
});

//XÓA IMG
function DeleteImage(pid){
    xhr.open('GET','/index.php?controller=AdminPage&action=DeleteImage&pid='+encodeURIComponent(pid.trim()));
    xhr.onload = function(){
        if(xhr.status == 200){
            console.log(pid)
            if(xhr.responseText.trim() == 'delete success'){
                [name, extension] = pid.split(".");
                console.log('name1: '+name);
                listTableBody.removeChild(document.getElementById(name));
                console.log('name: '+name);
            }else{
                alert(xhr.responseText.trim());
            }
        }else{
            alert('Đã có lỗi xảy ra!');
        }
    };
    xhr.send();
}
//XÓA USER
function DeleteUser(uname){
    xhr.open('GET','/index.php?controller=AdminPage&action=DeleteUser&uname='+encodeURIComponent(uname.trim()));
    xhr.onload = function(){
        if(xhr.status == 200){
            console.log(uname);
            if(xhr.responseText.trim() == 'delete success'){
                listTableBody.removeChild(document.getElementById(uname));
            }else{
                alert(xhr.responseText.trim());
            }
        }else{
            alert('Đã có lỗi xảy ra!');
        }
    };
    xhr.send();
}
//XÓA
modalDeleteButton.addEventListener('click', ConfirmDelete);
deleteElementId = '';
function Delete(uiid){
    deleteElementId = uiid.trim();
}
function ConfirmDelete(){
    if(ml == 'UserList'){
        DeleteUser(deleteElementId);
    }else{
        DeleteImage(deleteElementId);
    }
}


function ChangeModalContent(){
    if(ml == 'UserList'){
        modalTitle.textContent = 'Xóa người dùng';
        modalBody.textContent = 'Bạn muốn xóa người dùng này?';
    }
    if(ml == 'ImageList'){
        modalTitle.textContent = 'Xóa ảnh';
        modalBody.textContent = 'Bạn muốn xóa ảnh này?';
    }
}


//UPDATE IMG
function GetUpdateImage(pid){
    imageTitleErrorMessage.textContent = '';
    updateImageId = pid;
    xhr.open('GET','/index.php?controller=AdminPage&action=GetImage&pid='+encodeURIComponent(pid));
    xhr.onload = function(){
        if(xhr.status == 200){
            receivedData = JSON.parse(xhr.responseText);
            image.src = './Public/img/'+pid;
            imageTitle.value = receivedData.Title;
            imageCategory.value = receivedData.Category
            imageDescription.value = receivedData.Description;
        }else{
            alert('Đã có lỗi xảy ra!');
        }
    };
    xhr.send();
}

modalImageSaveChangeButton.addEventListener('click',SaveChangeImage);
function SaveChangeImage(){
    xhr.open('POST','/index.php?controller=AdminPage&action=UpdateImage&imgId='+encodeURIComponent(updateImageId));
    formData = new FormData(document.getElementById('image-infor-form'));
    xhr.onload = function(){
        if(xhr.status === 200){
            msg = xhr.responseText.trim();
            switch(msg){
                case 'update success':
                    modalImageCloseButton.click();

                    //tách id của ảnh ra vì để fsfsdf.jpg thì ko thể query selector đc
                    [name, extension] = updateImageId.split(".");
                    parentElement = document.getElementById(name);
                    parentElement.querySelector('.image-title').textContent = imageTitle.value.trim();
                    parentElement.querySelector('.image-description').textContent = imageDescription.value.trim();
                    parentElement.querySelector('.image-category').textContent = imageCategory.value.trim();

                    break;
                case 'title empty':
                    imageTitleErrorMessage.textContent = 'Không được để trống';
                    break;
                default:
                    alert(msg);
            }
            
        }else{
            alert('Đã có lỗi xảy ra!');
        }
    }

    xhr.send(formData);
}

//Update User
function GetUpdateUser(uId){
    xhr.open('GET','/index.php?controller=AdminPage&action=GetUser&uId='+encodeURIComponent(uId));
    updateUserId = uId;
    console.log('tim '+updateUserId);
    xhr.onload = function(){
        if(xhr.status == 200){
            console.log(xhr.responseText);
            receivedData = JSON.parse(xhr.responseText);
           userEmail.value = receivedData.Email;
           userUsername.value = receivedData.Username;
           userPassword.value = receivedData.Password;
           userLastname.value = receivedData.Lastname;
           userFirstname.value = receivedData.Firstname;
        }else{
            alert('Đã có lỗi xảy ra!');
        }
    };
    xhr.send();
}

modalUserSaveChangeButton.addEventListener('click', SaveChangeUser);
function SaveChangeUser(){

    for(i = 0; i<errorMessages.length ; i++){
        errorMessages[i].textContent = '';
    }

    checkEmpty = false;
    if(userEmail.value.length === 0){
        document.getElementById('email-error-message').textContent = 'Không được để trống!';
        checkEmpty = true;
    }
    if(userUsername.value.length === 0){
        document.getElementById('username-error-message').textContent = 'Không được để trống!';
        checkEmpty = true;
    }
    if(userPassword.value.length === 0){
        document.getElementById('password-error-message').textContent = 'Không được để trống!';
        checkEmpty = true;
    }

    if(!checkEmpty){
        xhr.open('POST','/index.php?controller=AdminPage&action=UpdateUser&uId='+encodeURIComponent(updateUserId));
        formData = new FormData(document.getElementById('user-infor-form'));

        xhr.onload = function(){
            if(xhr.status === 200){
                if(xhr.responseText.trim() == 'update success'){
                    modalUserCloseButton.click();
                    parentElement = document.getElementById(updateUserId);
                    parentElement.querySelector('.user-email').textContent = userEmail.value;
                    parentElement.querySelector('.user-username').textContent = userUsername.value;
                    parentElement.querySelector('.user-password').textContent = userPassword.value;
                    parentElement.querySelector('.user-fullname').textContent = userLastname.value+' '+userFirstname.value;
                }else{
                    
                }
                
            }else{
                alert('Đã có lỗi xảy ra!');
            }
        }

        xhr.send(formData);
    }

}

//FILLTER JS
function toggleOptions3() {
    var sub_cate1 = document.querySelector('.sub-cate1');
    sub_cate1.style.display = sub_cate1.style.display === 'block' ? 'none' : 'block';
}
function selectOption5(optionIndex) {
    var image_category = document.getElementById('image-category');
    var options = document.querySelectorAll('.sub-cate10');
    options.forEach(function(option, index) {
        if (index === optionIndex - 1) {
          option.classList.add('selected');
        } else {
          option.classList.remove('selected');
        }
      });
      image_category.value = options[optionIndex - 1].textContent;
    toggleOptions3();
}
