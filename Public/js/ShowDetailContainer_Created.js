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

//FILTER JS
var nav_sorteds1 = document.querySelector('.nav-sorteds1');
//CATEGORY JS
var cate_others = document.querySelector('.cate-others10');

input1.addEventListener("input", function() {
  this.style.height = "auto";
  this.style.height = (this.scrollHeight) + "px";
});

var textarea1 = document.getElementById("description-created");

textarea1.addEventListener("input", function() {
  this.style.height = "auto";
  this.style.height = (this.scrollHeight) + "px";
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
var categoryCreated = document.getElementById('categoryCreated');
var detailTileCreated = document.getElementById('detail-title-created');
var detailImgCreated = document.querySelector('.detail-img-created');
var detailDescriptionCreated = document.getElementById('description-created');
var dateUploadedCreated = document.querySelector('.detail-date-uploaded-created');
var detailUploaderCreated = document.querySelector('.detail-uploader-created');
var detailUploaderAvatarCreated = document.querySelector('.detail-avatar-created');
var likeNumberCreated = document.querySelector('.like-number-created');
var saveNumberCreated = document.querySelector('.save-number-created');
var commentNumberCreated = document.querySelector('.comment-number-created');

//CloseShowDetailsContainerCreated
function CloseShowDetailsContainerCreated(){
  showDetailsContainerCreated.style.display = "none";
  nav_sorteds1.style.display = "none";
  cate_others.style.display = "none";
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

  xhr.open('POST', '/index.php?controller=ShowDetailContainer_Created&action=GetImage');
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    var receivedData = JSON.parse(xhr.responseText);

    showDetailsContainerCreated.style.display = "block";
    setTimeout(function () {
      showDetailsContainerCreated.classList.add("show-details-container-show-up-created");
      showDetailsContainerCreated.style.zIndex = "20";
    }, 20); // Thời gian đếm ngược (đơn vị: mili giây)
    
    // imgDetailsContainer.innerHTML = receivedData.title;
    categoryCreated.value = receivedData.category;
    detailTileCreated.value = receivedData.title;
    detailImgCreated.src = "./Public/img/"+receivedData.path;
    detailDescriptionCreated.value = receivedData.description;
    dateUploadedCreated.textContent = receivedData.dateuploaded
    detailUploaderCreated.textContent = receivedData.uploader;
    detailUploaderAvatarCreated.src = "./Public/profileimg/"+receivedData.uploaderAvatar;
    likeNumberCreated.textContent = receivedData.likeNumber;
    saveNumberCreated.textContent = receivedData.saveNumber; 
    commentNumberCreated.textContent = receivedData.commentNumber;  

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
  xhr.open('POST', '/index.php?controller=ShowDetailContainer_Created&action=DeleteImage');
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
  xhr.open('POST', '/index.php?controller=ShowDetailContainer_Created&action=UpdateImage&pid=' + encodeURIComponent(imgId));
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

commenter.addEventListener('keypress', submitFeedback1);
send11.addEventListener('click', submitFeedback1);
function submitFeedback1(e){
  if (e.keyCode === 13 || e.type === "click") { 
    //tăng số hiển thị comment
    commentNumberCreated.textContent = parseInt(commentNumberCreated.textContent)+1;
    AddComment();
    const userForm1 = getUsernameCreated.value;
    const userAvatar1 = getUserAvatarCreated.value;
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
  }
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
  xhr.open('POST','/index.php?controller=ShowDetailContainer_Created&action=DeleteComment');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function(){
    if(xhr.status === 200){
      console.log(xhr.responseText);
      showAndHide('Đã xóa bình luận!');
      //giảm số hiển thị comment
      commentNumberCreated.textContent = parseInt(commentNumberCreated.textContent)-1;
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
  xhr.open('POST','/index.php?controller=ShowDetailContainer_Created&action=Comment');
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
  xhr.open('POST','/index.php?controller=ShowDetailContainer_Created&action=GetComments');
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


//FILTER JS

function togglenav_sorteds1() {
  nav_sorteds1.style.display = nav_sorteds1.style.display === 'block' ? 'none' : 'block';
}
function selectnav_sorted1(optionIndex, comFilter) {
  var nav_sorted1 = document.querySelectorAll('.nav-sorted1');
  nav_sorted1.forEach(function(option, index) {
      if (index === optionIndex - 1) {
        option.classList.add('selected');
      } else {
        option.classList.remove('selected');
      }
    });
    togglenav_sorteds1();

    FilterCommentCreated(comFilter);
}

function FilterCommentCreated(comFilter){
  console.log('filterc');
  xhr.open('GET','/index.php?controller=ShowDetailContainer_Created&action=FilterComment&pid='+encodeURIComponent(imgId)+'&comFilter='+encodeURIComponent(comFilter));
  xhr.onload = function(){
    if(xhr.status === 200){
      commentsContain1.innerHTML = xhr.responseText;
    }else{
      alert('Đã có lỗi xảy ra!');
    }
  };
  xhr.send();
}

//CATEGORY JS
function toggleOptions10() {
  cate_others.style.display = cate_others.style.display === 'block' ? 'none' : 'block';
}
function selectOption10(optionIndex) {
  var categories = document.querySelector('.categories25');
  var cate_other = document.querySelectorAll('.cate-other10');
  cate_other.forEach(function(option, index) {
      if (index === optionIndex - 1) {
        option.classList.add('selected');
      } else {
        option.classList.remove('selected');
      }
    });
  categories.value = cate_other[optionIndex - 1].textContent;
  toggleOptions10();
}

