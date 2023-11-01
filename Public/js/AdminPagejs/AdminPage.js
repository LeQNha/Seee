var usersManagementButton = document.getElementById('users-management');
var imagesManagementButton = document.getElementById('images-management');
var deleteAllButton = document.getElementById('delete-all-button');
var mainTable = document.getElementById('main-table');
var listTableBody = document.getElementById('list-table-body')

//MODAL
var modalBody = document.querySelector('.modal-body');
var modalTitle = document.querySelector('.modal-title');
var modalDeleteButton = document.getElementById('modal-delete-button');

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