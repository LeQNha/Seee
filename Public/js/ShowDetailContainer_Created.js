var input1 = document.getElementById("detail-title-created");

//NotifyMessage
var notifyMessage = document.querySelector('.notify-message');
var message = document.querySelector('.notify-message p');

//COMMENT SECTION
var commenter = document.getElementById('comment-input');
var send11 = document.getElementById("send");
var commentImagePathCreated = document.getElementById('comment-image-path-created');

feedbackArr1 = [];
const commentsContain1= document.querySelector('.comments');

var getUserAvatarCreated = document.getElementById('get-user-avatar-created');
var getUsernameCreated = document.getElementById('get-user-username-created');

input1.addEventListener("input", function() {
  this.style.height = "auto";
  this.style.height = (this.scrollHeight) + "px";
});
input1.addEventListener("input", function() {
  if (input1.value.length > 0) {
    input1.style.border = "none"; // Nếu có ít nhất một ký tự, ẩn viền
  } else {
    input1.style.border = "1px solid black"; // Nếu trống, hiển thị viền lại
  }
});

var textarea1 = document.getElementById("description-created");

textarea1.addEventListener("input", function() {
  this.style.height = "auto";
  this.style.height = (this.scrollHeight) + "px";
});

textarea1.addEventListener("input", function() {
  if (textarea1.value.length > 0) {
    textarea1.style.border = "none"; // Nếu có ít nhất một ký tự, ẩn viền
  } else {
    textarea1.style.border = "1px solid black"; // Nếu trống, hiển thị viền lại
  }
});

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
    commentImagePathCreated.value = imgId;
    GetCommentsCreated(pid);
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
  xhr.open('POST', 'index.php?controller=ShowDetailContainer_Created&action=DeleteImage');
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if(xhr.status === 200){
      if(xhr.responseText.trim(0) == 'remove success'){
        
        //Xóa nó khỏi personal page
        imagesContainer.removeChild(document.getElementById(pid));
        showAndHide('Đã xóa ảnh!');
      }
    }else{
      alert('Đã có lỗi xảy ra!');
    }
    
  }
  xhr.send("pid=" + encodeURIComponent(pid));
  confirmRemoveImageModal.style.display = 'none';
  CloseShowDetailsContainerCreated();

  //giảm số lượng ảnh tải lên
  uploadedImgNum = parseInt(document.getElementById('number-uploaded-image').textContent) - 1;
  document.getElementById('number-uploaded-image').textContent = uploadedImgNum;
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
      // console.log('có nhân = ' + xhr.responseText +' ' + imgId );
      if(xhr.responseText.trim() == 'update success'){
        // alert('Cập nhật thành công');
        showAndHide('Đã cập nhật!');
      }else{
        alert(xhr.responseText.trim());
      }
    }else{
      alert('Đã có lỗi xảy ra!');
    }
  }
  xhr.send(formData);
}

//comment

// var currentDateParagraph = document.getElementById('currentDate');
// var currentDate = new Date();

// var day = currentDate.getDate();
// var month = currentDate.getMonth() + 1; // Lưu ý rằng tháng bắt đầu từ 0
// var year = currentDate.getFullYear();

// var formattedDate = day + '/' + month + '/' + year;
// currentDateParagraph.textContent = formattedDate;


send11.addEventListener('click', submitFeedback1);
function submitFeedback1(e){
  AddComment();
  const userForm1 = getUsernameCreated.value;
  const userAvatar1 = getUserAvatarCreated.value
  const commentForm1 = commenter.value;
  const date1 = currentDateParagraph.textContent;
  // if inputs are not empty
  if(commentForm1 !== ''){
      // create new feedback
      newFeedback1 = {
          "id": Math.floor((Math.random() * 1000)+ 1),
          "userName": userForm1,
          "userAvatar": userAvatar1,
          "userComment": commentForm1,
          "dated": date1
      };
      // add new feedback to array
      feedbackArr1.push(newFeedback1);
      // clear inputs 
      resetForm1();
      // add feedback to list
      addFeedback1(newFeedback1);
  }
  e.preventDefault();
};
function resetForm1(){
  commenter.value = '';
  // positiveFeedback = false
};

function addFeedback1(item){
    // create new div
    const div1 = document.createElement('div');
    // add class
    div1.classList = 'comment__card1';
    // add id
    div1.id = item.id;
    // add html
    div1.innerHTML = `
                          <img id="avt-img1" src="./Public/profileimg/${item.userAvatar}" alt="">
                          <div class="comment__info1">
                              <div class="main-com-fo1">
                                  <span class="nickname1">
                                      ${item.userName}
                                  </span>
                                  <span class="currentDate1">
                                      1 giây trước
                                  </span>
                              </div>
                              <p class="comment10">
                                  ${item.userComment}
                              </p>
                              <div class="comment__bottom1">
                                  <div class="like__icon--comment1">
                                      <i id="like__icon1" class="fa-regular fa-thumbs-up"></i>
                                      <small class="counted">0</small>
                                      <i id="dislike__icon1" class="fa-regular fa-thumbs-down"></i>
                                      <small class="counted1">0</small>
                                  </div>
                                  <button class="reply1">
                                      Phản hồi
                                  </button>
                                  <button onclick="deleteDiv(`+imgId+`)" class="delete1">Xóa</button>
                              </div>
                          </div>
    `;
    
    // insert feedback into the list
    commentsContain1.insertAdjacentElement('afterbegin', div1);

    // Lấy tham chiếu đến các phần tử bên trong div
    const counted = div1.querySelector('.counted');
    const counted1 = div1.querySelector('.counted1');
    var likeico = div1.querySelector("#like__icon1");
    var dislikeico = div1.querySelector("#dislike__icon1");

    // Gắn kết lại sự kiện cho likeico và dislikeico
    likeico.addEventListener("click", likeComment1(likeico, dislikeico, counted, counted1));
    dislikeico.addEventListener("click", dislikeComment1(dislikeico, likeico, counted1, counted));
};

        const counted = document.querySelector('.counted');
        const counted1 = document.querySelector('.counted1');
        let likesCount1 = 0;
        let dislikeCount1 = 0;
        var likeico = document.getElementById('like__icon1'); // Lấy tham chiếu đến phần tử like__icon
        var dislikeico = document.getElementById('dislike__icon1'); // Lấy tham chiếu đến phần tử dislike__icon
        var isLiked1 = false; // Biến theo dõi trạng thái like
        var isDisliked1 = false; // Biến theo dõi trạng thái dislike 
      function likeComment1(likeico, dislikeico, counted, counted1) {
        return function() {
            if (!isLiked1) {
                likeico.classList.remove("fa-regular");
                likeico.classList.add("fa-solid");
                likeico.classList.add("liked1");
                isLiked1 = true;
                likesCount1++;
                counted.innerHTML = likesCount1;
    
                // Kiểm tra nếu dislike đã được chọn thì hủy chọn nó
                if (isDisliked1) {
                    dislikeico.classList.remove("fa-solid");
                    dislikeico.classList.add("fa-regular");
                    isDisliked1 = false;
                    dislikeico.classList.remove("disliked");
                    dislikeCount1--;
                    counted1.innerHTML = dislikeCount1;
                }
            } else {
                likeico.classList.remove("fa-solid");
                likeico.classList.add("fa-regular");
                isLiked1 = false;
                likeico.classList.remove("liked1");
                likesCount1--;
                counted.innerHTML = likesCount1;
                if (!isDisliked1) {
                  dislikeico.classList.remove("fa-regular");
                  dislikeico.classList.add("fa-solid");
                  isDisliked1 = true;
                  dislikeico.classList.add("disliked");
                  dislikeCount1++;
                  counted1.innerHTML = dislikeCount1;
                }
            }
        };
    }
    
    function dislikeComment1(dislikeico, likeico, counted1, counted) {
        return function() {
            if (!isDisliked1) {
                dislikeico.classList.remove("fa-regular");
                dislikeico.classList.add("fa-solid");
                isDisliked1 = true;
                dislikeico.classList.add("disliked");
                dislikeCount1++;
                counted1.innerHTML = dislikeCount1;
    
                // Kiểm tra nếu like đã được chọn thì hủy chọn nó
                if (isLiked1) {
                    likeico.classList.remove("fa-solid");
                    likeico.classList.add("fa-regular");
                    isLiked1 = false;
                    likeico.classList.remove("liked1");
                    likesCount1--;
                    counted.innerHTML = likesCount1;
                }
            } else {
                dislikeico.classList.remove("fa-solid");
                dislikeico.classList.add("fa-regular");
                isDisliked1 = false;
                dislikeico.classList.remove("disliked");
                dislikeCount1--;
                counted1.innerHTML = dislikeCount1;
                if (!isLiked1) {
                  likeico.classList.remove("fa-regular");
                  likeico.classList.add("fa-solid");
                  likeico.classList.add("liked1");
                  isLiked1 = true;
                  likesCount1++;
                  counted.innerHTML = likesCount1;
                }
                
            }
        };
    }
  //DELETE COMMENT
function deleteDiv(comId) {
  console.log('xoa: '+comId);
  xhr.open('POST','index.php?controller=ShowDetailContainer_Created&action=DeleteComment');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function(){
    if(xhr.status === 200){
      console.log(xhr.responseText);
      showAndHide('Đã xóa bình luận!');
    }else{
      alert('Đã có lỗi xảy ra!');
    }

  }
  xhr.send('comId='+encodeURIComponent(comId));
  // xhr.send();
  commentsContain1.removeChild(document.getElementById(comId));
}


//ADD COMMENT
function AddComment(){
  xhr.open('POST','index.php?controller=ShowDetailContainer_Created&action=Comment');
  var commentFormDataCreated = new FormData(document.getElementById('comment-form-created'));
  xhr.onload = function(){
    if(xhr.status === 200){
      
    }else{
      alert('Đã có lỗi xảy ra');
    }
  }
  xhr.send(commentFormDataCreated);
  // xhr.send();
}
//GET COMMENTS
function GetCommentsCreated(pid){
  console.log('getcom');
  xhr.open('POST','index.php?controller=ShowDetailContainer_Created&action=GetComments');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function(){
    if(xhr.status === 200){
      commentsContain1.innerHTML = xhr.responseText;
    }else{
      alert('Đã có lỗi xảy ra!');
    }
  }

  xhr.send('pid='+encodeURIComponent(pid));
}

//NotifyMessage
function showAndHide(msg){

  if(message){
    console.log('co ton tai');
  }else{
    console.log('ko ton');
  }

  message.textContent = msg;
  notifyMessage.style.top = "91vh";
  notifyMessage.style.opacity = "0.9";

   setTimeout(function () {
       notifyMessage.style.top = "100vh"; // Ẩn thẻ div sau khoảng thời gian
       notifyMessage.style.opacity = "0.3";
     }, 2000); // Thời gian đếm ngược (đơn vị: mili giây)
}