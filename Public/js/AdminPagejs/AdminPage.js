var usersManagementButton = document.getElementById('users-management');
var imagesManagementButton = document.getElementById('images-management');
var deleteAllButton = document.getElementById('delete-all-button');
var mainTable = document.getElementById('main-table');
var listTableBody = document.getElementById('list-table-body')

//MODAL DELETE
var modalBody = document.querySelector('.modal-body');
var modalTitle = document.querySelector('.modal-title');
var modalDeleteButton = document.getElementById('modal-delete-button');

//MODAL UPDATE IMG
var image = document.getElementById('image');
var imageTitle = document.getElementById('image-title');
var imageDescription = document.getElementById('image-description');
var modalImageSaveChangeButton = document.getElementById('modal-image-save-change-button');
var modalImageCloseButton = document.getElementById('modal-image-close-button');
var updateImageId = '';
var updateImageTitle = document.getElementById('image-title');
var updateImageDescription = document.getElementById('image-description');
var imageTitleErrorMessage = document.getElementById('image-title-error-messsage');

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
    xhr.open('GET','index.php?controller=AdminPage&action=SwitchManagement&list=UsersManagement');
    xhr.onload = function(){
        if(xhr.status === 200){
            mainTable.innerHTML = xhr.responseText;
        }else{
            alert('Đã có lỗi xảy ra!');
        }
    }
    xhr.send();
    history.pushState(null,null,'index.php?controller=AdminPage&list=UsersManagement');
    ml = 'UserList';
    ChangeModalContent();
});

imagesManagementButton.addEventListener('click', function(){
    usersManagementButton.classList.remove('more_nav-clicked');
    imagesManagementButton.classList.add('more_nav-clicked');
    xhr.open('GET','index.php?controller=AdminPage&action=SwitchManagement&list=ImagesManagement');
    xhr.onload = function(){
        if(xhr.status === 200){
            mainTable.innerHTML = xhr.responseText;
        }else{
            alert('Đã có lỗi xảy ra!');
        }
    }
    xhr.send();
    history.pushState(null,null,'index.php?controller=AdminPage&list=ImagesManagement');
    ml = 'ImageList';
    ChangeModalContent();
});

//XÓA IMG
function DeleteImage(pid){
    xhr.open('GET','index.php?controller=AdminPage&action=DeleteImage&pid='+encodeURIComponent(pid.trim()));
    xhr.onload = function(){
        if(xhr.status == 200){
            console.log(pid)
            if(xhr.responseText.trim() == 'delete success'){
                listTableBody.removeChild(document.getElementById(pid));
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
    xhr.open('GET','index.php?controller=AdminPage&action=DeleteUser&uname='+encodeURIComponent(uname.trim()));
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
    xhr.open('GET','index.php?controller=AdminPage&action=GetImage&pid='+encodeURIComponent(pid));
    xhr.onload = function(){
        if(xhr.status == 200){
            console.log('get image');
            receivedData = JSON.parse(xhr.responseText);
            image.src = './Public/img/'+pid;
            imageTitle.value = receivedData.Title;
            imageDescription.value = receivedData.Description;
        }else{
            alert('Đã có lỗi xảy ra!');
        }
    };
    xhr.send();
}

modalImageSaveChangeButton.addEventListener('click',SaveChangeImage);
function SaveChangeImage(){
    console.log('dfsfs');
    xhr.open('POST','index.php?controller=AdminPage&action=UpdateImage&imgId='+encodeURIComponent(updateImageId));
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
                    parentElement.querySelector('.image-title').textContent = updateImageTitle.value.trim();
                    parentElement.querySelector('.image-description').textContent = updateImageDescription.value.trim();
                    // document.querySelector('#6524fa54571b1\\.jpg .image-title') ví dụ
                    // document.querySelector('#' + name + ' .image-title').textContent = updateImageTitle.value.trim();
                    // document.querySelector('#' + name + ' .image-description').textContent = updateImageDescription.value.trim();
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
