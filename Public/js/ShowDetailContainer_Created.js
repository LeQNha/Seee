// var input = document.getElementById("detail-title-created");

// input.addEventListener("input", function() {
//   if (input.value.length > 0) {
//     input.style.border = "none"; // Nếu có ít nhất một ký tự, ẩn viền
//   } else {
//     input.style.border = "1px solid black"; // Nếu trống, hiển thị viền lại
//   }
// });

// var textarea = document.getElementById("description");

// textarea.addEventListener("input", function() {
//   this.style.height = "auto";
//   this.style.height = (this.scrollHeight) + "px";
// });

// textarea.addEventListener("input", function() {
//   if (textarea.value.length > 0) {
//     textarea.style.border = "none"; // Nếu có ít nhất một ký tự, ẩn viền
//   } else {
//     textarea.style.border = "1px solid black"; // Nếu trống, hiển thị viền lại
//   }
// });

// var commentInput = document.getElementById("comment-input");
// var submitButton = document.getElementById("send");
// var commentDisplay = document.getElementById("comment-container");

// submitButton.addEventListener("click", function() {
//   var commentText = commentInput.value;

//   if (commentText.trim() !== "") { // Kiểm tra xem nội dung bình luận có trống không
//     var commentElement = document.createElement("p");
//     commentElement.textContent = commentText;
//     commentDisplay.appendChild(commentElement);
//     commentInput.value = ""; // Xóa nội dung khỏi ô văn bản
//   }
// });


//Phần chính

var xhr = new XMLHttpRequest();

//Show img details
var showDetailsContainerCreated = document.querySelector('.show-details-container-created');
var detailTileCreated = document.getElementById('detail-title-created');
var detailImgCreated = document.querySelector('.detail-img-created');
var detailDescriptionCreated = document.getElementById('description-created');
var dateUploadedCreated = document.querySelector('.detail-date-uploaded-created');
var detailUploaderCreated = document.querySelector('.detail-uploader-created');
var detailUploaderAvatarCreated = document.querySelector('.detail-avatar-created');

//CloseShowDetailsContainerCreated
function CloseShowDetailsContainerCreated(){
  showDetailsContainerCreated.style.display = "none";
  showDetailsContainerCreated.classList.add("show-details-container-show-up-created");
  setTimeout(function () {
    showDetailsContainerCreated.classList.remove("show-details-container-show-up-created");
  }, 20); // Thời gian đếm ngược (đơn vị: mili giây)
  
  document.body.style.overflow = "auto";
}

var imgId = "";
function ShowDetails_Created(pid){
  //ngăn trang web cuộn
  document.body.style.overflow = "hidden";

  //close show details
  var closeShowDetailsButtonCreated = document.querySelector('.close-show-details-created');
  closeShowDetailsButtonCreated.addEventListener('click',CloseShowDetailsContainerCreated);

  xhr.open('POST', 'index.php?controller=ShowDetailContainer&action=GetImage');
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    var receivedData = JSON.parse(xhr.responseText);

    showDetailsContainerCreated.style.display = "block";
    setTimeout(function () {
      showDetailsContainerCreated.classList.add("show-details-container-show-up-created");
      showDetailsContainerCreated.style.zIndex = "20";
    }, 20); // Thời gian đếm ngược (đơn vị: mili giây)
    
    // imgDetailsContainer.innerHTML = receivedData.title;
    detailTileCreated.value = receivedData.title;
    detailImgCreated.src = "./Public/img/"+receivedData.path;
    detailDescriptionCreated.textContent = receivedData.description;
    dateUploadedCreated.textContent = receivedData.dateuploaded
    detailUploaderCreated.textContent = receivedData.uploader;
    detailUploaderAvatarCreated.src = "./Public/profileimg/"+receivedData.uploaderAvatar;

    imgId = receivedData.path;
  };

  xhr.send("pid=" + encodeURIComponent(pid));
  
}

//REMOVE IMAGE
var removeImageButton = document.getElementById('delete-button-created');
var confirmRemoveImageModal = document.getElementById('confirm-remove-image-modal-overlay');

if(confirmRemoveImageModal){
  removeImageButton.addEventListener('click',RemoveImage);
  function RemoveImage(){
    confirmRemoveImageModal.style.display = 'block';
  };

  var confirmRemoveImageButton = document.getElementById('remove-image-confirm-button');
  confirmRemoveImageButton.addEventListener('click',ConfirmRemoveImage);
  var closeConfirmRemoveImageModal =document.getElementsByClassName('close-confirm-remove-image-modal');
  for (var i = 0; i < closeConfirmRemoveImageModal.length; i++) {
    closeConfirmRemoveImageModal[i].addEventListener('click', CloseConfirmRemoveImageModal);
  }
  function CloseConfirmRemoveImageModal(){
      confirmRemoveImageModal.style.display = 'none';
  }
}
 imagesContainer = document.querySelector('.container');
function ConfirmRemoveImage(pid){
  pid = imgId;
  xhr.open('POST', 'index.php?controller=ShowDetailContainer_Created&action=RemoveImage');
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if(xhr.responseText.trim(0) == 'remove success'){
      alert('Xóa thành công');
      //Xóa nó khỏi personal page
      imagesContainer.removeChild(document.getElementById(pid));
    }
  }
  xhr.send("pid=" + encodeURIComponent(pid));
  confirmRemoveImageModal.style.display = 'none';
  CloseShowDetailsContainerCreated();

  //giảm số lượng ảnh tải lên
  uploadedImgNum = parseInt(document.getElementById('uploaded-image-number').textContent) - 1;
  document.getElementById('uploaded-image-number').textContent = uploadedImgNum;
}

//Update img
var updateImageButton = document.getElementById('update-button-created');
updateImageButton.addEventListener('click',UpdateImage);
function UpdateImage(){
  xhr.open('POST', 'index.php?controller=ShowDetailContainer_Created&action=UpdateImage&pid=' + encodeURIComponent(imgId));
  // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  formData = new FormData(document.getElementById('update-image-infor-form'));
  xhr.onload = function(){
    if(xhr.status === 200){
      console.log('có nhân = ' + xhr.responseText +' ' + imgId );
      if(xhr.responseText.trim() == 'update success'){
        alert('Cập nhật thành công');
      }else{
        alert(xhr.responseText.trim());
      }
    }else{
      alert('Đã có lỗi xảy ra!');
    }
  }
  xhr.send(formData);
}




