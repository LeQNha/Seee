var usersManagement = document.getElementById('users-management');
var imagesManagement = document.getElementById('images-management');
var mainTable = document.getElementById('main-table');

var xhr = new XMLHttpRequest();

window.onload = function(){
    console.log('dc');
}

usersManagement.addEventListener('click', function(){
    mainTable.innerHTML = "<?php include 'AdminPagePartitions/UserList.php'; ?>";
});

imagesManagement.addEventListener('click', function(){
    mainTable.innerHTML = "<?php include 'AdminPagePartitions/ImageList.php'; ?>";
});